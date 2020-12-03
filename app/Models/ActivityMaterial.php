<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;
class ActivityMaterial extends Model
{
    //
    public $table = 'activity_material';
    public $fillable = ['user_id','activity_id','material_id','num','apply_status'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
