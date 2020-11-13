<?php
namespace App\Http\Controllers\Api;
use App\Models\AdminIp;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/6/5
 * Time: 14:26
 */

class AdminIpController extends Controller
{
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

        $offset = ($page-1) * $limit;
        $orderby = 'id';
        $sort = 'asc';
        $name = '';
        $ip = '';
        extract($where);
        $query = AdminIp::when($name!=='', function ($q) use ($name) {
            return $q->where('name','like','%'.$name.'%');
        });
        $query->when($ip!=='', function ($q) use ($ip) {
            return $q->where('ip','like','%'.$ip.'%');
        });
        $query->orderBy($orderby,$sort);
        $total = $query->count();
        $data = $query ->offset($offset)->limit($limit)->get();
        return $this->success(['list'=>$data,'total'=>$total]);
    }
}