<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //
    public $table = 'users';
    protected $fillable = [
        'username', 'password', 'name', 'phone', 'email', 'classNum', 'academy', 'major'
    ];
    protected $hidden = [
        'password','last_token'
    ];
    public function getRole()
    {
        return $this->belongsToMany(Role::class, 'Role_user', 'Role_id','user_id');
    }
}
