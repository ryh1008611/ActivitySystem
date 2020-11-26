<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    //
    public $table = 'activity_type';
    public $fillable = ['name', 'ActivityCode'];
    public $hidden = ['created_at','updated_at'];
}
