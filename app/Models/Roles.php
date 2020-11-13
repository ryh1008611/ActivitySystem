<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/8
 * Time: 15:22
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $guarded = [];


    /**
     * @param $value
     */
    public function setMenusAttribute($value)
    {
        $this->attributes['menus'] = json_encode($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getMenusAttribute($value)
    {
        return json_decode($value,true);
    }


    /**
     * @param $value
     */
    public function setPermissionsAttribute($value)
    {
        $this->attributes['permissions'] = json_encode($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getPermissionsAttribute($value)
    {
        return json_decode($value,true);
    }

    /**
     * @param $value
     */
    public function setPermissionsGroupAttribute($value)
    {
        $this->attributes['permissions_group'] = json_encode($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getPermissionsGroupAttribute($value)
    {
        return json_decode($value,true);
    }
}