<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    public $table = 'material';
    public $fillable = ['name','describe'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
