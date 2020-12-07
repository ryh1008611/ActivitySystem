<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
class RoleController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = Role::paginate($request->pageSize ? $request->pageSize : 10);
        return response()->json([
            'code' => 200,
            'data' => $data
        ]);
    }
}
