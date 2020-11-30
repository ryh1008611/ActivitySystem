<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\Api\UserResource;
use App\Jobs\Api\SaveLastTokenJob;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class UserController extends Controller
{

    //返回用户列表
    public function index(){
        //3个用户为一页
        $users = User::paginate(3);
        return UserResource::collection($users);
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
        User::create($request->all());
        return $this->setStatusCode(200)->success('用户注册成功');
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
    //用户登录
    public function login(Request $request){
        $token=Auth::claims(['guard'=>'api'])->attempt(['username'=>$request->username,'password'=>$request->password]);
        if($token) {
            //如果登陆，先检查原先是否有存token，有的话先失效，然后再存入最新的token
            $user = Auth::user();
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
