<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityMaterial;
class MaterialController extends Controller
{
    //添加一个物资
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required'
        ]);
        $res = Material::create($request->only('name','describe'));
        if($res){
            return response()->json(['code' => 200,'msg' => '添加成功',]);
        }
        return response()->json(['code' => 201,'msg' => '添加失败',]);
    }
    //查询物资
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
        $material = Material::paginate($pageSize);
        // 将字符串切割成数组
        return response()->json(['code' => 200,'msg' => '查询成功','records' => $material]);
    }
    //修改物资
    public function update(Request $request, $id)
    {
        $model = Material::find($id);
       if($model)
       {
        //    $request->only('content','adress','start','end')
            $res = $model->update($request->only('name','describe'));
            if($res){
                return response()->json(['code' => 200,'msg' => '修改成功',]);
            }
            return response()->json(['code' => 201,'msg' => '修改失败',]);
       }
       else
       {
        return response()->json(['code' => 201,'msg' => '物资不存在',]);
       }
    }
    // 删除物资
    public function destroy($id)
    {
        // 删除
        $model = Material::destroy($id);
        if($model)
        {
             return response()->json(['code' => 200,'msg' => '删除成功',]);
        }
        else
        {
         return response()->json(['code' => 201,'msg' => '物资不存在',]);
        }

    }

    public function Setmaterials(Request $request)
    {

        $user = Auth::user();
        // 添加一个用户id
        request()->offsetSet('user_id', $user->id);
        $res = ActivityMaterial::create($request->only('user_id','activity_id','material_id','num'));
        if($res)
        {
             return response()->json(['code' => 200,'msg' => '添加成功',]);
        }
        else
        {
         return response()->json(['code' => 201,'msg' => '添加失败',]);
        }
    }


}
