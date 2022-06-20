<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AchievementUser extends Model
{
    protected $table = 'user_achievements';

    public function dates(){
      return $this->belongsToMany('App\NewDate', 'date_purpose_new_date_user', 'id', 'new_date_id')->where('date_purpose_id', '=', 4);
    }

}
