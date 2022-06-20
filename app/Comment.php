<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user(){
      // when user_id was not added here as a parameter, it was displaying unique results as it was fetching results with primary key as id (for likes table)
      return $this->hasOne('App\User', 'id', 'user_id');
    }
}
