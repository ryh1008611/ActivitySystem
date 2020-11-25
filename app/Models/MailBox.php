<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailBox extends Model
{
    //
    public $table= 'mailbox';
    public $fillable = ['user_id','mail_adress','authorizationCode'];
}
