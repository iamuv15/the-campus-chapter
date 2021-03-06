<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'post_id';

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function likes(){
      return $this->hasMany('App\Like', 'post_id');
    }

    public function comments(){
      return $this->hasMany('App\Comment', 'post_id');
    }
}
