<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use App\Models\Images;
use App\Models\User;
class ActivityController extends Controller
{
    //
    public function getUserInfo(Request $request)
    {

        $data = Activity::find($request->activityId)->allStudent()->paginate($request->pageSize ? $request->pageSize : 10);
        if($request->input('pageSize'))
        {
            $data = Activity::find($request->activityId)->allStudent()->paginate($request->pageSize);
        }
        else
        {
            $data = Activity::find($request->activityId)->allStudent()->get();
        }
        if($data)
        {
            return response()->json([
                'code' => 200,
                'msg' => '请求成功',
                'data' => $data,
                'total' => count($data)]);
        }
        else
        {
            return response()->json(['code' => 201,'msg' => '该活动还没有人参加',]);
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
                return response()->json(['code' => 200,'msg' => '修改成功',]);
            }
            return response()->json(['code' => 201,'msg' => '修改失败',]);
       }
       else
       {
        return response()->json(['code' => 201,'msg' => '活动不存在',]);
       }
    }
    // 更改活动状态
    public function updateStatus(Request $request)
    {
        $model = Activity::find($request->id);
       if($model)
       {
        //    $request->only('content','adress','start','end')
            $res = $model->update([
                'status' => $request->status
            ]);
            if($res){
                return response()->json(['code' => 200,'msg' => '修改成功',]);
            }
            return response()->json(['code' => 201,'msg' => '修改失败',]);
       }
       else
       {
        return response()->json(['code' => 201,'msg' => '活动不存在',]);
       }
    }
    // /users/{user}
    public function destroy($id)
    {
        // 删除
        $user = Auth::user();
        $user_role = $user->getRole;
        $model = Activity::find($id);
        if($user_role[0]->Role_Key == 'ADMIN' || $user_role[0]->Role_Key == 'TEACHER')
        {
            if($model)
            {
             $res = $model->update([
                 'status' => 4
             ]);
             if($res){
                return response()->json(['code' => 200,'msg' => '删除成功',]);
             }
                return response()->json(['code' => 201,'msg' => '删除失败',]);
            }
            else
            {
                return response()->json(['code' => 201,'msg' => '活动不存在',]);
            }
        }
        else
        {
            return response()->json(['code' => 201,'msg' => '你没有这个权限',]);
        }

    }
    // 返回活动
    public function index(Request $request)
    {
        $user = Auth::user();
        $activity = Activity::where('user_id','=',$user->id)->where('status','=',1)->get();
        // 将字符串切割成数组
        return response()->json(['code' => 200,'msg' => '查询成功','data' => $activity]);
    }

    // 返回活动列表
    public function list(Request $request)
    {
        // 需要返回活动名称，活动标题，开始时间，结束时间
        $pageSize = $request->pageSize ? $request->pageSize : 10;
        $user = Auth::user();
        $user_role = $user->getRole;
        if($user_role[0]->Role_Key == 'ADMIN' || $user_role[0]->Role_Key == 'TEACHER')
        {
            $activity = Activity::where('status','!=',4);
        }
        else if($user_role[0]->Role_Key == 'COMMUNITY')
        {
            $activity = Activity::where('user_id','=',$user->id)->where('status','!=',4);
        }
        // 查询条件
        if($request->input('title'))
        {
            $activity = $activity->where('title','like','%'.$request->title.'%');
        }
        // 根据活动地址查询
        if($request->input('adress'))
        {
            $activity = $activity->where('adress','like','%'.$request->title.'%');
        }
        // 根据状态查询
        if($request->input('status'))
        {
            $activity = $activity->where('status','=',$request->status);
        }
        $activity = $activity->paginate($pageSize);
        // 将字符串切割成数组
        foreach($activity as $k)
        {
            $k->rule = explode('/', $k->rule);
            $k->prize = explode('/', $k->prize);
            // 获取全部属于该活动的id
            $images = Images::query()->where('activity_id','=',$k->id)->get();
            foreach($images as $item)
            {
                $item->url = env('APP_URL').$item->url;
            }
            $peopleNum = Activity::find($k->id)->allStudent;
            $k->offsetSet('joins', [
                'Num' => count($peopleNum),
                'people' => $peopleNum
            ]);
            // 该活动图片
            $k->offsetSet('name', User::where('id','=',$k->user_id)->get()[0]->name);
            $k->offsetSet('images', $images);
            // 获取该活动的所使用物资
            $k->offsetSet('material',Activity::find($k->id)->allMaterial);
        }
        // return 1;
        return response()->json(['code' => 200,'msg' => '查询成功','records' => $activity]);
    }




        // 添加活动

    public function store(Request $request)
    {

        // return $request->images;
        $this->validate($request, [
            'content' => 'required',
            'adress' => 'required'
        ]);
        // 获取当前用户
        $user = Auth::user();
        // 添加一个用户id
        request()->offsetSet('user_id', $user->id);
        $res = Activity::create($request->only('user_id','title','content','adress','rule','prize','start','end','status'));
        // return 
        if(count($request->images)>0)
        {
            foreach($request->images as $k)
            {
                Images::find($k['fileId'])->update([
                    'activity_id' => $res->id
                ]);
            }
        }
        if($res){
            return response()->json(['code' => 200,'msg' => '添加成功',]);
        }
        return response()->json(['code' => 201,'msg' => '添加失败',]);
    }
    public function show($id){
        $activity = Activity::where('id','=',$id)->get();
   
        if(count($activity)>0)
        {
            foreach($activity as $k)
            {
                // 获取规则
                $k->rule = explode('/', $k->rule);
                $k->prize = explode('/', $k->prize);
                // 获取全部属于该活动的id
                // 该活动图片
                $images = Images::query()->where('activity_id','=',$k->id)->get();
                foreach($images as $item)
                {
                $item->url = env('APP_URL').$item->url;
                }
                $k->offsetSet('images', $images);
                // 发起者姓名
                $k->offsetSet('name', User::where('id','=',$k->user_id)->get()[0]->name);
                
            }
            return response()->json(['code' => 200,'msg' => '查询成功','data'=>$activity]);
        }
        else
        {
            return response()->json(['code' => 201,'msg' => '找不到该活动']);
        }
    }

    // 获取我发布的活动
    public function myApplyActivity(Request $request) {
         // 需要返回活动名称，活动标题，开始时间，结束时间
    }
    public function myJoinActivity(Request $request) {
        
    }
    // 获取我参加的活动



    // 更改轮播栏状态
    public function updateRotation(Request $request) {
        $res = Activity::find($request->activityId)->update([
            'isRotation' => $request->isRotation
        ]);
        if($res)
        {
            return response()->json(['code' => 200,'msg' => '修改成功']); 
        }
        return response()->json(['code' => 201,'msg' => '修改失败']); 
    }

    // 更改资讯栏状态
    public function updateInfomation(Request $request) {
        $res = Activity::find($request->activityId)->update([
            'isInformation' => $request->isInformation
        ]);
        if($res)
        {
            return response()->json(['code' => 200,'msg' => '修改成功']); 
        }
        return response()->json(['code' => 201,'msg' => '修改失败']); 
    }


    // 获得活动轮播栏列表

    // 获得资讯栏状态列表
}
