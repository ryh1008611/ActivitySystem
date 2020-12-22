<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Role;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'name', 'phone', 'email', 'classNum', 'academy', 'major'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
    //将密码进行加密
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function getRole()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id','Role_id')->withPivot('id');
    }
    public function books(){
        return $this->hasMany(Book::class,'user_id','id')->limit(2);
    }

    // 获取我参加的所有活动
    public function allActivity()
    {
       //  获得这个活动的所有物资
       return $this->belongsToMany(Activity::class, 'activity_user', 'user_id','activity_id')->withPivot('status');
    }
}
