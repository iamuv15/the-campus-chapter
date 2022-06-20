<?php

namespace App;

use User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class RegisterCollege extends Model
{

  protected $primaryKey = 'college_id';

  public function programs(){
    return $this->belongsToMany('App\Program', 'course_program_register_college', 'college_id', 'program_id')->distinct('program_id');
  }

  public function courses(){
    return $this->belongsToMany('App\Course', 'course_program_register_college', 'college_id', 'course_id');
  }

}
