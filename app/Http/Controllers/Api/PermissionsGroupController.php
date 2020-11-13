<?php

namespace App\Http\Controllers\Api;

use App\Models\PermissionsGroup;
use App\Services\PermissionsGroupService;
use Illuminate\Http\Request;

class PermissionsGroupController extends Controller
{

    protected $permissionsGroupService;

    /**
     * PermissionsController constructor.
     * @param PermissionsService $PermissionsService
     */
    public function __construct(PermissionsGroupService $permissionsGroupService)
    {
        $this->permissionsGroupService = $permissionsGroupService;
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
        $data = $this->permissionsGroupService->lists($where,$page,$limit);
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
        $model = PermissionsGroup::create($request->only('group_name','group'));
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
        $model = PermissionsGroup::findOrFail($id);
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
