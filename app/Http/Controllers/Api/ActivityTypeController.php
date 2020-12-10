<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActivityType;
class ActivityTypeController extends Controller
{
    //获取活动类型列表
    public function index(Request $request){
        $data = ActivityType::query();
        // 搜索名字
        if($request->input('name'))
        {
            $data = $data->where('name','like','%'.$request->name.'%');
        }
        // 根据类型代号搜索
        if($request->input('ActivityCode'))
        {
            $data = $data->where('ActivityCode','=',$request->ActivityCode);
        }
        $data = $data->paginate($request->pageSize ? $request->pageSize : 10);
        if(count($data)>0)
        {
            return response()->json([
                'code'=> 200,
                'msg'=> '查询成功!',
                'data'=> $data
            ]);
        }
        else
        {
            return response()->json([
                'code'=> 201,
                'msg'=> '暂无数据'
            ]);
        }
    }

    // 添加一个活动类型
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'ActivityCode' => 'required'
        ]);
        $res = ActivityType::create($request->only('name','ActivityCode'));
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
                'code' => 200,
                'msg' => '添加失败!'
            ]);
        }
    }
    // 修改一个活动类型

    public function update(Request $request,$id)
    {
        $res = ActivityType::find($id)->update($request->only('name','ActivityCode'));
        if($res)
        {
            return response()->json([
                'code' => 200,
                'msg' => '修改成功!'
            ]);
        }
        else
        {
            return response()->json([
                'code' => 200,
                'msg' => '修改失败!'
            ]);
        }
    }

    // 删除一个活动类型

    public function destroy($id) {
      
        $res = ActivityType::find($id)->delete();
      //   删除活动类型
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
