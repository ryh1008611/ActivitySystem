<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ActivityUsers;
class JoinController extends Controller
{
    //查看我参加个活动
    public function index(Request $request)
    {
        $user = Auth::user();
        $activity = User::find($user->id)->allActivity();
        if($request->input('title'))
        {
            $activity = $activity->where('title','like','%'.$request->title.'%');
        }
        // 根据活动地点查询活动
        if($request->input('adress'))
        {
            $activity = $activity->where('adress','like','%'.$request->adress.'%');
        }
        //根据日期查询活动
        if($request->input('start'))
        {
            $activity = $activity->where('start','like','%'.$request->start.'%');
        }
        // 分页
        $activity = $activity->paginate($request->pageSize ? $request->pageSize : 10);
        return response()->json([
            'code'=> 200,
            'data'=> $activity
        ]);

    }

    public function show($id)
    {
        $user = Auth::user();
        $res = ActivityUsers::where('user_id','=',$user->id)->where('activity_id','=',$id)->get();
        if(count($res)>0)
        {
            return response()->json(['code'=>200,'state'=>true]);
        }
        return response()->json(['code'=>200,'state'=>false]);
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $res = ActivityUsers::where('user_id','=',$user->id)->where('activity_id','=',$request->activityId)->get();
        if(count($res)>0)
        {
            return response()->json(['code'=>201,'msg'=>'不能重复报名']);
        }
        $join = ActivityUsers::create([
            'user_id' => $user->id,
            'activity_id'=> $request->activityId
        ]);
        if($join)
        {
            return response()->json(['code'=>200,'msg'=>'报名成功!']);
        }
        return response()->json(['code'=>201,'msg'=>'报名失败!']);
    }
    // 签到
    public function signIn(Request $request) {
        // user_id
        $res = ActivityUsers::find($request->id)->update([
            'status' => $request->state
        ]);
        if($res)
        {
            return response()->json([
                'code' => 200,
                'msg' => '修改成功！'
            ]);
        }
        else
        {
            return response()->json([
                'code' => 201,
                'msg' => '修改失败！'
            ]);
        }
    }

}
