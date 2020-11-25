<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailInfo extends Model
{
    //
    public $table='email_info';
    public $fillable=['user_id','launch','target','content','title'];
}
