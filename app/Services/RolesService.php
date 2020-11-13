<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/8
 * Time: 16:23
 */
namespace App\Services;

use App\Models\Roles;

class RolesService{
    /**
     * @param $where
     * @param int $page
     * @param int $limit
     * @return mixed
     */
    public function lists($where,$page=1,$limit=10){
        $offset = ($page-1) * $limit;
        $role_name = '';
        $orderby = 'created_at';
        $sort = 'desc';
        extract($where);
        $query = Roles::when($role_name!=='', function ($q) use ($role_name) {
            return $q->where('role_name','like','%'.$role_name.'%');
        });
        //排序
        $query->orderBy($orderby,$sort);
        $total = $query->count();
        $data = $query ->offset($offset)->limit($limit)->get(['id','role_name','description','permissions_group']);
        return ['list'=>$data,'total'=>$total];
    }


}