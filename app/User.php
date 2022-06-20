<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;
    use \Illuminate\Auth\Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function post(){
    //   // it will search for post_id by default
    //   // add a second parameter for post_id if you have named it differently
    //   // add a third parameter for id if you have named it differently
    //   return $this->hasOne('App\Post');
    // }
    //
    public function posts(){
      return $this->hasMany('App\Post');
    }

    function userInfo(){
      return $this->hasOne('App\UserInfo');
    }

    // function likes(){
    //   return $this->hasMany('App\Like');
    // }

    function comments(){
      return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }

    public function checkStatus(){
      return $this->hasOne('App\CheckStatus');
    }

    public function programs(){
      return $this->belongsToMany('App\Program', 'course_program_user', 'user_id', 'program_id');
    }

    public function courses(){
      return $this->belongsToMany('App\Course', 'course_program_user', 'user_id', 'course_id');
    }

    public function personalStatements(){
      return $this->hasOne('App\personalStatement');
    }

    public function education_profiles(){
      return $this->belongsToMany('App\EducationProfile')->withPivot('institution_name', 'marks', 'year');
    }

    public function achievements(){
      return $this->hasMany('App\AchievementUser');
    }

    public function workExperiences(){
      return $this->hasMany('App\WorkExperienceUser');
    }

    public function skills(){
      return $this->belongsToMany('App\Skills', 'skill_user', 'user_id', 'skill_id');
    }

    public function interests(){
      return $this->belongsToMany('App\Interests', 'interest_user', 'user_id', 'interest_id');
    }

    public function languages_known(){
      return $this->belongsToMany('App\LanguagesKnown');
    }

    public function invites(){
      return $this->hasOne('App\Invitation', 'invite_email', 'email');
    }

    public function alternateEmails(){
      return $this->hasMany('App\AlternateEmail');
    }

    public function importantLinks(){
      return $this->hasMany('App\ImportantLink');
    }

    // public function dates(){
    //   return $this->belongsToMany('App\NewDate', 'date_purpose_new_date_user', 'user_id', 'new_date_id');
    // }

    // function userCollege(){
    //   return $this->hasOne('App\RegisterCollege');
    // }

    //
    // public function roles(){
    //   return $this->belongsToMany('App\Role');
    //
    //   //if pivot table is not used as the way suggested in laravel, we can follow this method
    //   /*
    //   * @user_roles => this is the table name for the pivot table
    //   * @user_id => this is the foreign key referencing to the user table
    //   * @role_id => this is the foreign key referencing to the roles table
    //   */
    //
    //   // return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
    // }
    //
    // public function photos(){
    //   return $this->morphMany('App\Photo', 'imageable');
    // }


}
