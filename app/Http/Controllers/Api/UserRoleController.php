<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
class UserRoleController extends Controller
{
    //
    public function index(Request $request){
        // 返回属于该用户的所有权限
        $roles = User::find($request->user_id)->getRole;
        return response()->json([
            'code' => 200,
            'data' => $roles
        ]);
    }

    //用户添加权限
    public function store(Request $request) {
        // 必要字段
        // user_id,role_id
        // 先查询是否有重复权限
        $roles = User::find($request->user_id)->getRole;
        foreach($roles as $r)
        {
            if($r->id == $request->role_id)
            {
                return response()->json([
                    'code' => 201,
                    'msg' => '不能添加相同的权限'
                ]);
            }
        }
        
        $res = UserRole::create($request->only('user_id','role_id'));
        if($res)
        {
            return response()->json([
                'code' => 200,
                'msg' => '添加成功!'
            ]);
        }
        else
        {
            return response()->json([
                'code' => 201,
                'msg' => '添加失败!'
            ]);
        }
        
    }
    //用户删除权限
    public function destroy(Request $request,$id) {
      
      $res = UserRole::find($id)->delete();
    //   删除权限
      if($res)
      {
        return response()->json([
            'code' => 200,
            'msg' => '删除成功!'
        ]);
      }
      else
      {
        return response()->json([
            'code' => 201,
            'msg' => '删除失败!'
        ]);
      }
    }
}
