<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    //
    public function uploadImg(Request $request)
    {
        $path = $request->file('file')->store('images');
        if($path)
        {
            $data = array(
                'code' => 200,
                'msg'  => '上传成功',
                'data' => array(
                    'src'   => "/public/images/".$path
                ));
            
        }
        else
        {
            $data = array(
                'code' => 201,
                'msg'  => '上传失败');
        }
       return response()->json($data);
    }
}
