<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Activity;

class ActivityController extends Controller
{
    //
    public function getUserInfo(Request $request)
    {
        //  $users=Activity::query()->where('id', '=', $request->activityId)->with('joinUser')->get();
        //     if($users){
        //         return response()->json([
        //             'code' => '200',
        //             'msg' => '操作成功',
        //             'data' => $users
        //         ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        //     }
        //     else
        //     {
        //         return response()->json([
        //             'code' => '201',
        //             'msg' => '该活动还没有人参加'
        //         ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        //     }
        if(is_nll($request->activityId))
        {

        }
        else
        {
            return response()->json([
                            'code' => '201',
                            'msg' => '该活动还没有人参加'
        ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
        // $users = Activity::find('1');
        // $user = $users->joinX;
        // return response()->json([
        //     'code' => '200',
        //     'data' => $user
        // ]);
        
        
    }

}
