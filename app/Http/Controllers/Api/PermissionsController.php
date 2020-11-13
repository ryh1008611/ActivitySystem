<?php

namespace App\Http\Controllers\Api;

use App\Models\Permissions;
use App\Services\PermissionsService;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    protected $PermissionsService;

    /**
     * PermissionsController constructor.
     * @param PermissionsService $PermissionsService
     */
    public function __construct(PermissionsService $PermissionsService)
    {
        $this->PermissionsService = $PermissionsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit',10);
        $page = $request->input('page',1);
        $where = $request->all();

        $data = $this->PermissionsService->lists($where,$page,$limit);
        return $this->success($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = Permissions::create($request->only('slug','name','http_method','http_path'));
        if($model){
            return $this->success('成功');
        }
        return $this->failed('失败');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Permissions::findOrFail($id);
        $res = $model->update($request->all());
        if($res){
            return $this->success('成功');
        }
        return $this->failed('失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
