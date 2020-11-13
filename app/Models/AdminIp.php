<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/25
 * Time: 16:09
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AdminIp extends Model
{

    protected $table = 'admin_ip';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}