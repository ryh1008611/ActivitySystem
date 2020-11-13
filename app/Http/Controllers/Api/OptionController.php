<?php

namespace App\Http\Controllers\Api;

use App\Models\Permissions;
use App\Models\PermissionsGroup;
use App\Models\Roles;
use Illuminate\Http\Request;

class OptionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		//
        $option = $request->input('key','');
		switch ($option)
		{
			case 'permissions':
                $data = Permissions::pluck('name','id');
				return $this->success($data);
            case 'roles':
                $data = Roles::pluck('role_name','id');
                return $this->success($data);
            case 'group_name':
                $data = PermissionsGroup::pluck('group_name','id');
                return $this->success($data);
			default:
				return  $this->failed('失败');
		}
	}
}
