<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActivityMaterial;
use App\Models\User;
use App\Models\Activity;
use App\Models\Material;
class ActivityMaterialController extends Controller
{
    //
    public function index(Request $request)
    {
        if(!$request->pageSize)
        {
            $pageSize = 10;
        }
        else
        {
            $pageSize = $request->pageSize;
        }
        $res = ActivityMaterial::paginate($pageSize);
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

    // 更改审核状态sda
    public function update(Request $request, $id)
    {     
        $this->validate($request, [
            'status' => 'required'
        ]);
        $data = ActivityMaterial::find($id)->update([
            'status' => $request->status
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
}
