<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\activity_user;
class Activity extends Model
{
    //
 public $table = 'activity';
 public function allStudent()
 {
    //  获得参加这个活动的所有学生
    return $this->belongsToMany(User::class, 'activity_user', 'activity_id','user_id');
 }
}
