<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActivityType;
class ActivityTypeController extends Controller
{
    //
    public function index(){
        $data = ActivityType::query()->get();
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
}
