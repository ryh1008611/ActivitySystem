<?php

namespace App\Http\Controllers\Api;

use App\Models\Roles;
use App\Services\RolesService;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    protected $rolesService;

    /**
     * PermissionsController constructor.
     * @param PermissionsService $PermissionsService
     */
    public function __construct(RolesService $rolesService)
    {
        $this->rolesService = $rolesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageSize = $request->input('limit',10);
        $page = $request->input('page',1);
        $where = $request->all();

        $data = $this->rolesService->lists($where,$page,$pageSize);
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
        $model = Roles::create($request->only('role_name','description','menus','permissions','permissions_group'));
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
        $res = Roles::where('id',$id)->first();
        if($res){
            return $this->success($res);
        }
        return $this->failed('失败');
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
        $model = Roles::findOrFail($id);
        $res = $model->update($request->only('role_name','description','menus','permissions','permissions_group'));
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
