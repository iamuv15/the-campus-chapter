<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckStatus extends Model
{
    public function onlineUsers(){
      return $this->hasMany('App\User');
    }
}
