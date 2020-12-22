<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityUsers extends Model
{
    //
    public $table = 'activity_user';
    public $fillable = ['user_id', 'activity_id', 'status'];
}
