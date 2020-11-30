<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EmailInfo;
class EmailInfoController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $res = EmailInfo::where('user_id','=',$user->id)->get();
        if(count($res)>0)
        {
            return response()->json([
                'code' => 200,
                'data' => $res
            ]);
        }
        else
        {
            return response()->json([
                'code' => 201,
                'data' => '没有信件'
            ]);
        }
    }
}
