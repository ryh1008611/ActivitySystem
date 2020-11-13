<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/15
 * Time: 11:13
 */
namespace App\Services;

use App\Models\PermissionsGroup;

class PermissionsGroupService{

    /**
     * @param $where
     * @param int $page
     * @param int $limit
     * @return mixed
     */
    public function lists($where,$page=1,$limit=10){
        $offset = ($page-1) * $limit;
        $group_name = '';
        $orderby = 'id';
        $sort = 'asc';
        extract($where);
        $query = PermissionsGroup::when($group_name!=='', function ($q) use ($group_name) {
            return $q->where('group_name','like','%'.$group_name.'%');
        });
        //排序
        $query->orderBy($orderby,$sort);
        $total = $query->count();
        $data = $query ->offset($offset)->limit($limit)->get();
        return ['list'=>$data,'total'=>$total];
    }
}