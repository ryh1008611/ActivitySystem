<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\activity_user;
use App\Models\Material;
class Activity extends Model
{
    //
 public $table = 'activity';
 public $fillable = ['user_id','title','content','adress','rule','prize','start','end','status'];
 public function allStudent()
 {
    //  获得参加这个活动的所有学生
    return $this->belongsToMany(User::class, 'activity_user', 'activity_id','user_id')->withPivot('status');
 }

 public function allMaterial()
 {
    //  获得这个活动的所有物资
    return $this->belongsToMany(Material::class, 'activity_material', 'activity_id','material_id')->where('status','=','1')->withPivot('num','user_id');
 }
}
