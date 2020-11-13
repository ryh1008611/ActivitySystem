<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/6/5
 * Time: 16:20
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Article extends Model
{

    protected $table = 'article';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}