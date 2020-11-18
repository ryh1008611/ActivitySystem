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

    public function index()
    {

    }
    public function store()
    {

    }

    public function create(Request $request)
    {
        // return $this->failed('失败');
        $this->validate($request, [
            'content' => 'required',
            'adress' => 'required',
        ]);
        $user = Auth::user();
        // return $user->id;
        $res = Activity::create([
            'content' => $request->content,
            'adress' => $request->adress,
            'user_id'=> $request->user_id
        ]);
        if($res){
            return $this->success('成功');
        }
        return $this->failed('失败');
    }

    public function update()
    {

    }

    public function show()
    {

    }

    public function save()
    {

    }

    public function destroy()
    {

    }

    public function edit()
    {

    }

}
