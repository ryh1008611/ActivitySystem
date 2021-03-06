<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\Api\UserResource;
use App\Jobs\Api\SaveLastTokenJob;
use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use App\Models\UserRole;
class UserController extends Controller
{

    //返回用户列表
    public function index(Request $request){
        //3个用户为一页
        $users = users::paginate($request->pageSize ? $request->pageSize : 10);
        foreach($users as $u)
        {
            $roles = [];
            foreach($u->getRole as $r)
            {
            array_push($roles,$r->Role_Key);
            }
            $u->offsetSet('roles',$roles);
        }
        if($users)
        {
            return response()->json([
                'code' => 200,
                'records' => $users
            ]);
        }
        else
        {
            return response()->json([
                'code' => 201,
                'msg' => '暂时信息'
            ]);
        }
    }
     //返回所有用户
     public function list(Request $request){
        //3个用户为一页
        $users = users::get();
        if($users)
        {
            return response()->json([
                'code' => 200,
                'records' => $users
            ]);
        }
        else
        {
            return response()->json([
                'code' => 201,
                'msg' => '暂时信息'
            ]);
        }
    }
    //返回单一用户信息
    public function show(User $user){
        return $this->success(new UserResource($user));
    }
    //返回当前登录用户信息
    public function info(){
        $user = Auth::user();
        $role = $user->getRole;
        $roles = [];
        foreach($role as $r)
        {
            array_push($roles,$r->Role_Key);
        }
        $user->offsetSet('roles',$roles);
        $user->offsetSet('avatar','https://www.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif');
        $user->offsetSet('introduction','还没有介绍');
        return $this->success($user);
    }
    //用户注册
    public function store(UserRequest $request){
        $res = User::create($request->all());
        if($res)
        {
            $role = UserRole::create([
                'user_id'=> $res->id,
                'role_id'=> 4
            ]);
            if($role)
            {
                return $this->setStatusCode(200)->success('用户注册成功');
            }
        }
        // return $this->setStatusCode(200)->success('用户注册成功');
    }
    // 当前用户信息修改
    public function update(UserRequest $request){
        $res = User::find(Auth::user()->id)->update($request->only('name','phone','classNum','academy','major'));
        if($res)
        {
            return $this->setStatusCode(200)->success('修改成功');
        }
        else
        {
            return $this->failed('修改失败',201);
        }
    }
    // 修改密码
    public function updatePassword(Request $request) {
        
        if($request->input('password')){
            $res = User::find(Auth::user()->id)->update([
                'password'=> $request->input('password') 
            ]);
        }
        if($res){
            Auth::logout();
            return $this->success('修改成功!请重新登录!');  
        }
        return $this->failed('失败');
    }
    //修改用户状态 0-可用 1-禁用
    public function updateStatus(Request $request){
        $res = User::where('id','=',$request->user_id)->update([
            'status' => $request->status
        ]);
        if($res)
        {
            return response()->json([
                'code' => 200 ,
                'msg' => '修改成功!'
            ]);
        }
        else
        {
            return response()->json([
                'code' => 200 ,
                'msg' => '修改失败!'
            ]);
        }
    }
    //用户登录
    public function login(Request $request){
        $token=Auth::claims(['guard'=>'api'])->attempt(['username'=>$request->username,'password'=>$request->password]);
        if($token) {
            //如果登陆，先检查原先是否有存token，有的话先失效，然后再存入最新的token
            $user = Auth::user();
            // if()
            if(User::find($user->id)->status == 1)
            return $this->failed('该账号被禁用',400);
            if($user->last_token){
                try{
                    Auth::setToken($user->last_token)->invalidate();
                }catch (TokenExpiredException $e){
                    //因为让一个过期的token再失效，会抛出异常，所以我们捕捉异常，不需要做任何处理
                }
            }
            SaveLastTokenJob::dispatch($user,$token);

            return $this->setStatusCode(200)->success(['token' => 'bearer ' . $token, 'msg' => '登录成功']);
        }
        return $this->failed('账号或密码错误',400);
    }
    //用户退出
    public function logout(){
        Auth::logout();
        return $this->success('退出成功...');
    }
}
