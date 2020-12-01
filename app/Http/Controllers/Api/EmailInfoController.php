<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EmailInfo;
use App\Models\MailBox;
class EmailInfoController extends Controller
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
        $user = Auth::user();
        $res = EmailInfo::where('user_id','=',$user->id)->paginate($pageSize);
        if(count($res)>0)
        {
            return response()->json([
                'code' => 200,
                'records' => $res
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

    public function Receive(Request $request)
    {
        if(!$request->pageSize)
        {
            $pageSize = 10;
        }
        else
        {
            $pageSize = $request->pageSize;
        }
        $user = Auth::user();
        $mailbox = MailBox::where('user_id','=',$user->id)->get();
        if(count($mailbox)>0)
        {
            $res = EmailInfo::where('target','=',$mailbox[0]->mail_adress)->paginate($pageSize);
            if(count($res)>0)
            {
                return response()->json([
                    'code'=> 200,
                    'records'=> $res
                ]);
            }
        }
        else
        {
            return response()->json([
                'code'=> 201,
                'msg'=> '没有绑定邮箱'
            ]);
        }
    }
}
