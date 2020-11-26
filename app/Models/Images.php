<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //
    public $table = 'images';
    public $fillable = ['activity_id','url','type','operter','fileType','OriginalName','fileName'];
    public $hidden = ['created_at','updated_at'];
}
