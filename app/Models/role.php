<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public $table = 'role';
    protected $fillable = [
        'name','Role_key','permissions','description'
    ];
}
