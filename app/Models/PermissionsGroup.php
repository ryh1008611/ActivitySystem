<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/15
 * Time: 10:50
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PermissionsGroup extends Model
{

    protected $table = 'permissions_group';
    protected $guarded = [];

    /**
     * @param $value
     */
    public function setGroupAttribute($value)
    {
        $this->attributes['group'] = json_encode($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getGroupAttribute($value)
    {
        return json_decode($value,true);
    }
}