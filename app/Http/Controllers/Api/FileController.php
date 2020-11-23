<?php
namespace App\Http\Controllers\Api;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/6/10
 * Time: 15:38
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Images;
use Illuminate\Support\Facades\Auth;
class FileController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    protected function upload(Request $request)
    {
        if ($request->isMethod('post')) {
            $file = $request->file('file');
            // 文件是否上传成功
            if ($file->isValid())
            {
                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                // 上传文件
                $filename =  date('Ymd') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('public')->put($filename, file_get_contents($realPath));
                $user = Auth::user();
                if($bool){
                    $res = Images::create([
                        'operter'=> $user->id,
                        'url'=> '/file/'.$filename,
                        'fileName'=>$filename,
                        'OriginalName'=>$originalName,
                        'fileType'=>$type
                    ]);
                    // $message = Storage::url($filename);
                    // return $this->success($message);
                    if($res)
                    {
                        return response()->json([
                            'code'=> 200,
                            'msg'=>'上传成功',
                            'data'=> [
                                'fileId'=>$res->id,
                                'url'=>env('APP_URL').$res->adress
                            ]
                        ]);
                    }
                }
            }
            return  $this->failed('上传失败');
        }
    }
}