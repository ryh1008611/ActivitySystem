<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/8
 * Time: 15:20
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{

    protected $table = 'permissions';
    protected $guarded = [];

    /**
     * @param array $id
     * @return mixed
     */
    public static function pluckSlug($id=[]){
        return Permissions::where('id','in',$id)->pluck('slug');
    }

    /**
     * @param $menus
     * @param array $result
     * @return array
     */
    public static function recursive($menus,$result=[]){
        foreach ($menus as $k=>$menu){
            $result[]=$menu['name'];
            if(isset($menu['children'])){
                $result=self::recursive($menu['children'],$result);
            }
        }
        return $result;
    }
}
