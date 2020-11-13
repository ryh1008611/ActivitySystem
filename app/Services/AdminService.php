<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/11
 * Time: 10:59
 */
namespace App\Services;

use App\Models\Admin;

class AdminService{
    /**
     * @param $where
     * @param int $page
     * @param int $limit
     * @return mixed
     */
    public function lists($where,$page=1,$limit=10){
        $offset = ($page-1) * $limit;
        $username = '';
        $orderby = 'id';
        $sort = 'desc';
        extract($where);
        $query = Admin::when($username!=='', function ($q) use ($username) {
            return $q->where('username','like','%'.$username.'%');
        });
        $query->with(['role']);
        //排序
        $query->orderBy($orderby,$sort);
        $total = $query->count();
        $data = $query ->offset($offset)->limit($limit)->get();
        return ['list'=>$data,'total'=>$total];
    }


}