<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\AdminIp;
use App\Models\Permissions;
use App\Models\PermissionsGroup;
use App\Models\Roles;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class AdminController extends Controller
{
    protected $adminService;

    /**
     * PermissionsController constructor.
     * @param PermissionsService $PermissionsService
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    //用户登录
    /**
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {
        //获取当前守护的名称
        $present_guard = Auth::getDefaultDriver();
        $token = Auth::claims(['guard'=>$present_guard])->attempt(['username' => $request->username, 'password' => $request->password,'status'=>1]);
        if ($token) {
            //如果登陆，先检查原先是否有存token，有的话先失效，然后再存入最新的token
            $user = Auth::user();
            if ($user->last_token) {
                try{
                    Auth::setToken($user->last_token)->invalidate();
                }catch (TokenExpiredException $e){
                    //因为让一个过期的token再失效，会抛出异常，所以我们捕捉异常，不需要做任何处理
                }
            }
            //
            $user->last_token = $token;
            $user->save();
            //SaveLastTokenJob::dispatch($user,$token);
            //系统服务
            $sysInfo = [
                ['name' => '操作系统', 'value' => php_uname('s')],  //'value'=>php_uname('s').' '.php_uname('r').' '.php_uname('v')],
                ['name' => 'PHP版本', 'value' => phpversion()],
                ['name' => 'Laravel版本', 'value' => app()::VERSION],
                ['name' => '数据库', 'value' => $this->getDbVersion()],
            ];
            //存一下ip
            AdminIp::create(['name'=>$user->username,'ip'=>$request->ip()]);
            return $this->success(['token' => 'bearer ' . $token,'sysInfo'=>$sysInfo,'name'=>$user->username]);
        }
        return $this->failed('账号或密码错误', 400);
    }


    /**
     * @return mixed
     */
    public function info()
    {
        $role_id = Auth::user()->role_id;
        $roles = Roles::where('id',$role_id)->first(['menus','permissions','permissions_group'])->toArray();
        $menus = $roles['menus'];
        if($menus){
            $menus = Permissions::recursive($menus,[]);
            array_push($menus,'404');
        }
        $groups = PermissionsGroup::whereIn('id',$roles['permissions_group'])->pluck('group')->toArray();
        $merge_groups = [];
        if($groups){
            foreach ($groups  as $group){
                    if($group){
                        $merge_groups = array_merge($merge_groups, $group);
                    }
            }
        }
        $permissions = Permissions::whereIn('id',$roles['permissions'])->pluck('slug')->toArray();
        $data = [
            'name'=> Auth::user()->username,
            'introduction'=>'一个平平无奇的用户',
            'roles'=>[Auth::user()->username],
            'avatar'=>'',
            'menus'=>array_unique(array_merge($menus,$permissions,$merge_groups)),
            'permissions'=>array_unique(array_merge($permissions,$merge_groups))
        ];
        return $this->success($data);
    }

    //用户退出
    public function logout()
    {
        Auth::logout();
        return $this->success('退出成功');
    }

    /**
     * @return mixed
     * 获取数据库版本
     */
    private function getDbVersion()
    {
        $v = "version()";
        $driverName = DB::select("select version()")[0]->$v;
        return $driverName;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request){
        $limit = $request->input('limit',10);
        $page = $request->input('page',1);
        $where = $request->all();

        $data = $this->adminService->lists($where,$page,$limit);
        return$this->success($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = Admin::create($request->only('username','password','status','role_id'));
        if($model){
            return $this->success('成功');
        }
        return $this->failed('失败');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Admin::findOrFail($id);
        if($request->input('password')){
            //$res = $model->update($request->only('username','password','status','role_id'));
            $res = $model->update($request->only('username','status','role_id'));
        }else{
            $res = $model->update($request->only('username','status','role_id'));
        }
        if($res){
            return $this->success('成功');
        }
        return $this->failed('失败');
    }
}
