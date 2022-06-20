<?php

namespace App;

use User;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'userinfo';

    public function userInfo(){
      return $this->hasOne('App\User');
    }

}
