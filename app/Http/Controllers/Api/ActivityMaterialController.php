<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActivityMaterial;
use App\Models\User;
use App\Models\Activity;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
class ActivityMaterialController extends Controller
{
    //
    public function index(Request $request)
    {
        // 设置分页默认页码
        if(!$request->pageSize)
        {
            $pageSize = 10;
        }
        else
        {
            $pageSize = $request->pageSize;
        }
        if($request->status == null)
        {
            $res = ActivityMaterial::paginate($pageSize);
        }
        else
        {
            $res = ActivityMaterial::where('status','=',$request->status)->paginate($pageSize);
        }
        foreach($res as $r)
        {
            // 目前没有时间去研究关联模型取值关系，目前先以这种粗暴方式实现
            $r->offsetSet('userName', User::find($r->user_id)->name);
            $r->offsetSet('materialName', Material::find($r->material_id)->name);
            $r->offsetSet('ActivityName', Activity::find($r->activity_id)->title);
        }
        if($res)
        {
            return response()->json([
                'code'=> 200,
                'records'=> $res
            ]);
        }
        
    }

    // 更改审核状态
    public function update(Request $request, $id)
    {   
        // return 1;  
        $this->validate($request, [
            'apply_status' => 'required'
        ]);
        $data = ActivityMaterial::find($id)->update([
            'apply_status' => $request->apply_status
        ]);
        if($data)
        {
            return response()->json([
                'code' => 200,
                'msg' => '修改成功'
            ]);
        }
        else
        {
            return response()->json([
                'code' => 201,
                'msg' => '修改失败'
            ]);
        }
    }

    public function show(Request $request)
    {
        // 设置分页默认页码
        if(!$request->pageSize)
        {
            $pageSize = 10;
        }
        else
        {
            $pageSize = $request->pageSize;
        }
        $user = Auth::user();
        if($request->status == null)
        {
            $res = ActivityMaterial::where('user_id','=',$user->id)->paginate($pageSize);
        }
        else
        {
            $res = ActivityMaterial::where('user_id','=',$user->id)->where('apply_status','=',$request->status)->paginate($pageSize);
        }
        foreach($res as $r)
        {
            // 目前没有时间去研究关联模型取值关系，目前先以这种粗暴方式实现
            $r->offsetSet('userName', User::find($r->user_id)->name);
            $r->offsetSet('materialName', Material::find($r->material_id)->name);
            $r->offsetSet('ActivityName', Activity::find($r->activity_id)->title);
        }
        if($res)
        {
            return response()->json([
                'code'=> 200,
                'records'=> $res
            ]);
        }
        
        }
    public function store(Request $request)
    {
        $this->validate($request, [
            'activity_id' => 'required',
            'material_id' => 'required',
            'num' =>'required'
        ]);
        $user = Auth::user();
        $request->offsetSet('user_id', $user->id);
        $res = ActivityMaterial::create($request->only('user_id','activity_id','material_id','num'));
        if($res)
        {
            return response()->json([
                'code'=> 200,
                'msg'=> '添加成功!'
            ]);
        }
        else
        {
            return response()->json([
                'code'=> 201,
                'msg'=> '添加失败!'
            ]);
        }
    }
    // 更改未审核信息
    public function updateMaterialInfo(Request $request) {
        $res = ActivityMaterial::find($request->id)->update($request->only('num'));
        if($res)
        {
            return response()->json([
                'code'=> 200,
                'msg'=> '修改成功!'
            ]);
        }
        else
        {
            return response()->json([
                'code'=> 201,
                'msg'=> '修改失败!'
            ]);
        }
    }
}
