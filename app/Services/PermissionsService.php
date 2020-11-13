<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/8
 * Time: 16:24
 */
namespace App\Services;

use App\Models\Permissions;

class PermissionsService{

    /**
     * @param $where
     * @param int $page
     * @param int $limit
     * @return mixed
     */
    public function lists($where,$page=1,$limit=10){
        $offset = ($page-1) * $limit;
        $name = '';
        $orderby = 'id';
        $sort = 'asc';
        extract($where);
        $query = Permissions::when($name!=='', function ($q) use ($name) {
            return $q->where('name','like','%'.$name.'%');
        });
        //排序
        $query->orderBy($orderby,$sort);
        $total = $query->count();
        $data = $query ->offset($offset)->limit($limit)->get();
        return ['list'=>$data,'total'=>$total];
    }
}