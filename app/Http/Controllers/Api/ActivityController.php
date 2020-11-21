<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    //
    public function getUserInfo(Request $request)
    {

        $data = Activity::find($request->activityId);
        if($data)
        {
            $data = $data->allStudent;
            return response()->json([
                'code' => '200',
                'msg' => '请求成功',
                'data' => $data,
                'total' => count($data)]);
        }
        else
        {
            return response()->json(['code' => '201','msg' => '该活动还没有人参加',]);
        }
        
    }
    // /users
    public function edit()
    {}
    // /users/{user}/edit
    public function update(Request $request, $id)
    {
        $model = Activity::find($id);
       if($model)
       {
        //    $request->only('content','adress','start','end')
            $res = $model->update($request->only('content','adress','start','end'));
            if($res){
                return response()->json(['code' => '200','msg' => '修改成功',]);
            }
            return response()->json(['code' => '201','msg' => '修改失败',]);
       }
       else
       {
        return response()->json(['code' => '201','msg' => '活动不存在',]);
       }
    }
    // /users/{user}
    public function destroy()
    {
        // 删除
        // $model = Activity::find($id);
        // if($model)
        // {
        //  //    $request->only('content','adress','start','end')
        //      $res = $model->update($request->only('content','adress','start','end'));
        //      if($res){
        //          return response()->json(['code' => '200','msg' => '修改成功',]);
        //      }
        //      return response()->json(['code' => '201','msg' => '修改失败',]);
        // }
        // else
        // {
        //  return response()->json(['code' => '201','msg' => '活动不存在',]);
        // }

    }
    // '/users/{user}'
    // 查询活动
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
        $activity = Activity::paginate($pageSize);
        return response()->json(['code' => '200','msg' => '查询成功','records' => $activity]);
    }
        // 添加活动
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $this->failed('失败');
        $this->validate($request, [
            'content' => 'required',
            'adress' => 'required'
        ]);
        $user = Auth::user();
        $res = Activity::insert([
            [
                'content' => $request->content,
                'adress' => $request->adress,
                'user_id'=> $user->id,
                'start'=> $request->start,
                'end'=> $request->end,
            ]
        ]);
        if($res){
            return response()->json(['code' => '200','msg' => '添加成功',]);
        }
        return response()->json(['code' => '201','msg' => '添加失败',]);
    }

    // public function update()
    // {

    // }

    public function show()
    {

    }

    public function save()
    {

    }

    // public function destroy()
    // {

    // }
    // 修改活动
    // public function edit()
    // {

    // }

}
