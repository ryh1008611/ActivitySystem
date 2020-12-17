<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
// 模型
use App\Models\MailBox;
use App\Models\EmailInfo;
use App\Models\User;
class MailController extends Controller
{
    //
    // 关联邮箱，邮箱绑定
    public function store(Request $request){
        // 传入值
        // user_id
        // mail_adress
        // authorizationCode
        // 首先判断user_id是否存在
        $this->validate($request, [
            'authorizationCode' => 'required',
            'mail_adress' => 'required'
        ]);
        $user = Auth::user();
        $res = MailBox::where('user_id','=',$user->id)->get();
        $res_email = MailBox::where('mail_adress','=',$request->mail_adress)->get();
        if(count($res)>0)
        {
            return response()->json([
                'code'=>201,
                'msg'=>'该账号已经绑定了邮箱'
            ]);
        }
        else if(count($res_email)>0)
        {
            return response()->json([
                'code'=>201,
                'msg'=>'该邮箱已被绑定'
            ]);
        }
        else
        {
            $request->offsetSet('user_id',$user->id);
            // 更改用户邮箱绑定表
            $mail_info = MailBox::create($request->only('user_id','mail_adress','authorizationCode'));
            // 更改用户邮箱信息
            $uses_update = User::find(Auth::user()->id)->update(['email' => $request->mail_adress ]);
            // 返回信息
            if($mail_info)
            {
                return response()->json([
                    'code'=>200,
                    'msg'=>'绑定成功'
                ]);
            }
            else
            {
                return response()->json([
                    'code'=>201,
                    'msg'=>'绑定失败'
                ]);
            }
        }

    }
    public function index()
    {
        $user = Auth::user();
        $res = MailBox::where('user_id','=',$user->id)->get();
        if($res)
        {
            return response()->json([
                'code' => 200,
                'data'=> $res
            ]);
        }

    }
    public function sendMail(Request $request)
    {
        // Config::set('mail.encryption','ssl');
        $user = Auth::user();
        $res = MailBox::where('user_id','=',$user->id)->get();
        $target = $request->target;
        $title = $request->title;
        $content = $request->content;
        if(count($res)>0)
        {
            Config::set('mail.host','smtp.qq.com');
            Config::set('mail.port','25');
            Config::set('mail.username',$res[0]->mail_adress);
            Config::set('mail.password',$res[0]->authorizationCode);
            Config::set('mail.from',  ['address' => $res[0]->mail_adress , 'name' => $user->name]);
            Mail::raw($content, function ($message) use ($target,$title) {
                $message ->to($target)->subject($title);
            });
    
            if(!Mail::failures())
            {
                // 存储发送的内容
                $info = EmailInfo::create([
                    'user_id'=>$user->id,
                    'launch'=>$res[0]->mail_adress,
                    'target'=>$target,
                    'title'=>$title,
                    'content'=>$content  
                ]);
                if($info)
                {
                    return response()->json([
                        'code'=>200,
                        'msg'=>'发送成功！'
                    ]);
                }
                else
                {
                    return response()->json([
                        'code'=>201,
                        'msg'=>'记录数据失败！'
                    ]);
                }
            }
            else
            {
                return response()->json([
                    'code'=>201,
                    'msg'=>'发送失败！'
                ]);
            }
            
        }
        else
        {
            return response()->json([
                'code'=>201,
                'msg'=>'该用户还未绑定邮箱'
            ]);
        }
    }

    // 发送验证码
    public function sendCheckCode(Request $request)
    {
        $CheckCode = mt_rand(10000,99999);
        $target = $request->target;
        // settype($CheckCode,"string");
        // Dear member: Hello! We will send you an email verification code. This verification code needs to be proofread. You need to fill in the verification code when applying. ————Student activity management
        $content = "Dear member: \nHello! We will send you an email verification code. \nThis verification code needs to be proofread. You need to fill in the verification code when applying. \n————Student activity management.\n您的验证码为:".strval($CheckCode);
        $title = "学生活动管理中心";
        Mail::raw($content, function ($message) use ($target,$title) {
                $message ->to($target)->subject($title);
        });
        if(!Mail::failures())
        {
            return response()->json([
                'code'=>200,
                'msg'=>'发送成功!',
                'CheckCode'=> $CheckCode,
                'email' => $target
            ]);
        }
        else
        {
            return response()->json([
                'code'=>201,
                'msg'=>'发送失败!'
            ]);
        }
    }


    // 群体发送
    public function sendUserGroup(Request $request)
    {
        // return $request->userInfo[0];
        $user = Auth::user();
        $res = MailBox::where('user_id','=',$user->id)->get();
        // $target = $request->target;
        $title = $request->title;
        $content = $request->content;
        if(count($res)>0)
        {

            // return 1;
            foreach($request->userList as $u)
            {
                $target = User::where('id','=',$u['id'])->get()[0]->email;
                Config::set('mail.host','smtp.qq.com');
                Config::set('mail.port','25');
                Config::set('mail.username',$res[0]->mail_adress);
                Config::set('mail.password',$res[0]->authorizationCode);
                Config::set('mail.from',  ['address' => $res[0]->mail_adress , 'name' => $user->name]);
                Mail::raw($content, function ($message) use ($target,$title) {
                    $message ->to($target)->subject($title);
                });
        
                if(!Mail::failures())
                {
                    // 存储发送的内容
                    $info = EmailInfo::create([
                        'user_id'=>$user->id,
                        'launch'=>$res[0]->mail_adress,
                        'target'=>$target,
                        'title'=>$title,
                        'content'=>$content  
                    ]);
            }
            ////////
            else
            {
                return response()->json([
                    'code'=>201,
                    'msg'=>'发送失败！'
                ]);
            }

            ///////////
            
        }
        return response()->json([
            'code'=>200,
            'msg'=>'发送成功！'
        ]);

    }
        else
        {
            return response()->json([
                'code'=>201,
                'msg'=>'该用户还未绑定邮箱'
            ]);
        }
    }
}
