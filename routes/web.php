<?php

use App\Post;
use App\User;
use App\Role;
use App\Country;
use App\Photo;
use App\RegisterCollege;
use App\Comment;
use App\Invitation;
use App\PersonalStatement;
use App\EducationProfileUser;
use App\AchievementUser;
use App\WorkExperienceUser;
use App\AlternateEmail;
use App\ImportantLink;
use Illuminate\Http\Request;
// use App\Http\Controllers\ChapterComposer;

Route::get('/', 'PostsController@ajaxGet')->name('dashboard');

Route::get('/signup', 'UserController@checkAuthentication');


Route::post('/s', [
  'uses' => 'UserController@userInviteCheck',
  'as' => 's'
]);

Route::post('/login', [
  'uses' => 'UserController@userSignin',
  'as' => 'login'
]);

Route::post('/logout', 'UserController@logout')->name('logout')->middleware('auth');

Route::get('admin/invite/user/EeVB2KUlpJmeP5', function(){
  return view('admin.invite_users');
});

Route::post('admin/invite/user', 'InviteController@inviteUser')->name('invite.user');

// Routing user to a profile (User, College, Company)
Route::get('/{profile}', function($profile){
  $user = User::where('username', $profile)->first();
  $college = RegisterCollege::where('abbrivation', $profile)->first();
  $posts = Post::all()->sortByDesc("post_id");
  $comments = Comment::all();
  // $posts = Post::all()->sortByDesc("post_id");
  if($user){
    return view('user.chapter')->with((['posts' => $posts, 'commented' => $comments, 'user' => $user]));
  }
  else if($college) {
    return view('college.college')->with(['posts' => $posts, 'commented' => $comments, 'college' => $college]);
  }
  else if($profile == 'notifications'){
    echo 'le le';
  }
  else if($profile == 'reminders'){
    echo 'reminders';
  }
});

Route::post('{username}/update', function($username, Request $request){
  if($request->ajax()){
      if(strlen($request['text']) > 0 && strlen($request['text']) <= 250){

      $check = DB::table('personal_statement')->where('user_id', '=', Auth::user()->id)->exists();

        if(!$check){
          $perStmt = new PersonalStatement();

          $perStmt->user_id = Auth::user()->id;
          $perStmt->personal_statement = $request['text'];

          if($perStmt->save()){
            echo 'success';
          }

        }
        else{
          DB::table('personal_statement')->where('user_id', '=', Auth::user()->id)->update([
            'personal_statement' => $request['text']
          ]);
          echo 'updated';
        }

      }
      else{
        echo 'invalid';
      }
  }
});

Route::post('{username}/update/education', function($username, Request $request){
  if($request->ajax()){
    $data = $request['data'];

    if(($data['education_profile'] !== null) && ($data['name'] !== null) && ($data['input_marks'] !== null) && ($data['Year'] !== null)){
      $insert = new EducationProfileUser();

      $insert->user_id = Auth::user()->id;
      $insert->education_profile_id = $data['education_profile'];
      $insert->institution_name = $data['name'];
      $insert->marks = $data['input_marks'];
      $insert->year = $data['Year'];

      if($insert->save()){
        echo 'success';
      }
      else{
        echo 'something went wrong';
      }
    }
    else{
      echo 'Fill in all fields';
    }

    // if(!$data->education_profile && !$data->name && !$data->input_marks && !$data->year){
    //   echo 'error';
    // }

  }
});

Route::post('{username}/update/achievements', function($username, Request $request){
  if($request->ajax()){
    $data = $request['data'];
    print_r($data);

    if(($data['title'] !== null) && ($data['name'] !== null) && ($data['month'] !== null) && ($data['Year'] !== null)){
      $insert = new AchievementUser();

      $insert->user_id = Auth::user()->id;
      $insert->title = $data['title'];
      $insert->describe = $data['name'];

      if(DB::table('new_dates')->where([
        ['date', '=', null],
        ['month', '=', $data['month']],
        ['year', '=', $data['Year']]
      ])->first()){
        $result = DB::table('new_dates')->where([
          ['date', '=', null],
          ['month', '=', $data['month']],
          ['year', '=', $data['Year']]
        ])->first();

        DB::table('date_purpose_new_date_user')->insert([
          ['user_id' => Auth::user()->id, 'date_purpose_id' => 4, 'new_date_id' => $result->id]
        ]);

      }
      else{
        DB::table('new_dates')->insert([
          ['date' => null, 'month' => $data['month'], 'year' => $data['Year']]
        ]);

        $result = DB::table('new_dates')->where([
          ['date', '=', null],
          ['month', '=', $data['month']],
          ['year', '=', $data['Year']]
        ])->first();

        DB::table('date_purpose_new_date_user')->insert([
          ['user_id' => Auth::user()->id, 'date_purpose_id' => 4, 'new_date_id' => $result->id]
        ]);
        }

      if($insert->save()){
        echo 'success';
      }
      else{
        echo 'something went wrong';
      }
    }
    else{
      echo 'Fill in all fields';
    }

    // if(!$data->education_profile && !$data->name && !$data->input_marks && !$data->year){
    //   echo 'error';
    // }

  }
});

Route::post('{username}/update/work_experience', function($username, Request $request){
  if($request->ajax()){
    $data = $request['data'];
    print_r($data);

    if(($data['name'] !== null) && ($data['describe'] !== null) && ($data['start_month'] !== null) && ($data['start_Year'] !== null)){

      $insert = new WorkExperienceUser();

      $insert->user_id = Auth::user()->id;
      $insert->company_name = $data['name'];
      $insert->job_description = $data['describe'];

      if(DB::table('new_dates')->where([
        ['date', '=', null],
        ['month', '=', $data['start_month']],
        ['year', '=', $data['start_Year']]
      ])->first()){
        $result = DB::table('new_dates')->where([
          ['date', '=', null],
          ['month', '=', $data['start_month']],
          ['year', '=', $data['start_Year']]
        ])->first();

        DB::table('date_purpose_new_date_user')->insert([
          ['user_id' => Auth::user()->id, 'date_purpose_id' => 2, 'new_date_id' => $result->id]
        ]);

        $insert->start_date = $result->id;

      }
      else{
        DB::table('new_dates')->insert([
          ['date' => null, 'month' => $data['start_month'], 'year' => $data['start_Year']]
        ]);

        $result = DB::table('new_dates')->where([
          ['date', '=', null],
          ['month', '=', $data['start_month']],
          ['year', '=', $data['start_Year']]
        ])->first();

        DB::table('date_purpose_new_date_user')->insert([
          ['user_id' => Auth::user()->id, 'date_purpose_id' => 2, 'new_date_id' => $result->id]
        ]);

        $insert->start_date = $result->id;

      }

        if(($data['end_month'] !== null) && ($data['end_Year'] !== null)){
          // user is no more working in the specified Company

          if(DB::table('new_dates')->where([
            ['date', '=', null],
            ['month', '=', $data['end_month']],
            ['year', '=', $data['end_Year']]
          ])->first()){
            $result = DB::table('new_dates')->where([
              ['date', '=', null],
              ['month', '=', $data['end_month']],
              ['year', '=', $data['end_Year']]
            ])->first();

            DB::table('date_purpose_new_date_user')->insert([
              ['user_id' => Auth::user()->id, 'date_purpose_id' => 2, 'new_date_id' => $result->id]
            ]);

            $insert->end_date = $result->id;

          }
          else{
            DB::table('new_dates')->insert([
              ['date' => null, 'month' => $data['end_month'], 'year' => $data['end_Year']]
            ]);

            $result = DB::table('new_dates')->where([
              ['date', '=', null],
              ['month', '=', $data['end_month']],
              ['year', '=', $data['end_Year']]
            ])->first();

            DB::table('date_purpose_new_date_user')->insert([
              ['user_id' => Auth::user()->id, 'date_purpose_id' => 2, 'new_date_id' => $result->id]
            ]);

            $insert->end_date = $result->id;
            }
          }
          else{
            // user is currently working in the specified company

            $insert->end_date = null;

          }

        if($insert->save()){
          echo 'success';
        }
        else{
          echo 'something went wrong';
        }

      }
      else{
        echo 'Fill in all fields';
      }

    // if(!$data->education_profile && !$data->name && !$data->input_marks && !$data->year){
    //   echo 'error';
    // }
  }

});

Route::post('{username}/update/contact', function($username, Request $request){
  if($request->ajax()){
    $data = $request['data'];

    if(($data['contact_number'] !== null) || ($data['email'] !== null) || ($data['link'] !== null)){

      if($data['contact_number'] !== null){
        if(!preg_match('/^[0-9]{10}+$/', $data['contact_number'])){
          echo 'Invalid Mobile Number';
        }
        else{
          DB::table('userinfo')->where('user_id', '=', Auth::user()->id)->update(['contact_number' => $data['contact_number']]);
        }
      }

      $result = DB::table('users')->where('id', '=', Auth::user()->id)->value('email');

      if($data['email'] !== null){
        if($data['email'] !== $result){
          if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {

            $insert = new AlternateEmail();

            $insert->user_id = Auth::user()->id;
            $insert->email = $data['email'];

            if($insert->save()){
              echo 'success';
            }
            else{
              echo 'something went wrong';
            }
          }
          else{
            // Incorrect form of email
            echo 'This is not a valid email format!';
          }
        }
        else {
          // user have the same email, the one he used at the time of registration
        }
      }

      if($data['link'] !== null){

        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$data['link'])) {
          echo 'Invalid URL';
        }
        else{

          $url = $data['link'];
          $urlParts = parse_url($url);

          // // remove www
          if(isset($urlParts['host']) && isset($urlParts['path'])){
            $domain = preg_replace('/^www\./', '', $urlParts['host']);
            $url = $domain.$urlParts['path'];
          }
          else{
            $url = preg_replace('/^www\./', '', $url);
          }

          echo $url;

          $insert = new ImportantLink();

          $insert->user_id = Auth::user()->id;
          $insert->important_links = $url;

          if($insert->save()){
            echo 'success';
          }
          else{
            echo 'something went wrong';
          }
        }
      }
      else{
        // user is not adding any important links to the profile.
      }
    }
    // else{
    //   echo 'Fill in all fields';
    // }

    // if(!$data->education_profile && !$data->name && !$data->input_marks && !$data->year){
    //   echo 'error';
    // }

  }
});

Route::get('/{username}/ui', function($username){
  return view('userinfo');
})->middleware('auth');

Route::post('/{username}/userinfo', 'UserInfoController@userInfoUpdate')->name('userinfo')->middleware('auth');

// all routes related to college

Route::get('/{college}/job_posting', function($college){
  // check if college exists
  return view('college.job_posting');
});

Route::get('/{college}/job_profile', function($college){
  // check if college exists
  return view('college.college');
});

Route::get('/{college}/manage', function($college){
  // check if college exists
  return view('college.manage');
});

Route::get('/register/college', function(){
  return view('college.register');
});

Route::post('/register/college', 'RegisterColleges@newCollegeRegister')->name('register.college');

Route::post('/search/skills', function(Request $request){
  if($request['search'] !== null){

    // array of the id's of all the skills user already have.
    $already_selected_skill = DB::table('skill_user')->where('user_id', '=', Auth::user()->id)->get();

    $array_skill_id = [];

      foreach ($already_selected_skill as $key) {
        $array_skill_id[] = $key->skill_id;
      }

      /**
        * Two type of situations are handled here.
        * -- Firstly -> removes the skills user has already Saved
        * -- Secondly -> removes the skills that user has chosen to be updated/saved
      **/
      $result = DB::table('skills')
      ->where([
        ['skills', 'like', '%'.$request['search'].'%'],
        ['id', 'NOT LIKE', $request['not_like']]
        ])
        ->whereNotIn('id', $array_skill_id)
        ->limit(4)
        ->get();

        foreach($result as $value) {
          echo "<li id=".$value->id.">$value->skills</li>";
        }

  }

});

Route::post('/add/skills', function(Request $request){

  $array = array_unique (array_merge ($request['skill_set'], $request['items_added']));

  $result = DB::table('skills')->whereNotIn('id', $array)->limit(1)->get();

  foreach($result as $value) {
    echo "<li id=".$value->id.">$value->skills</li>";
  }
});

Route::post('{username}/add/skills', function(Request $request){
  if($request->ajax()){
    DB::table('skill_user')->insert([
      ['user_id' => Auth::user()->id, 'skill_id' => $request['id']]
    ]);
  }
});

Route::post('/search/interests', function(Request $request){
  if($request['search'] !== null){
    $already_selected = DB::table('interest_user')->where('user_id', '=', Auth::user()->id)->get();

    $array_interest_id = [];

      foreach ($already_selected as $key) {
        $array_interest_id[] = $key->interest_id;
      }

    $result = DB::table('interests')
    ->where([
      ['interests', 'like', '%'.$request['search'].'%'],
      ['id', 'NOT LIKE', $request['not_like']]
      ])
      ->whereNotIn('id', $array_interest_id)
      ->limit(4)
      ->get();

      foreach($result as $value) {
        echo "<li id=".$value->id.">$value->interests</li>";
      }



  }

});

Route::post('/add/interests', function(Request $request){

  $array = array_unique (array_merge ($request['skill_set'], $request['items_added']));

  $result = DB::table('interests')->whereNotIn('id', $array)->limit(1)->get();

  foreach($result as $value) {
    echo "<li id=".$value->id.">$value->interests</li>";
  }
});

Route::post('{username}/add/interests', function(Request $request){
  if($request->ajax()){
    DB::table('interest_user')->insert([
      ['user_id' => Auth::user()->id, 'interest_id' => $request['id']]
    ]);
  }
});

Route::post('/search/languages', function(Request $request){
  if($request['search'] !== null){

    // array of the id's of all the skills user already have.
    $already_selected_languages = DB::table('languages_known_user')->where('user_id', '=', Auth::user()->id)->get();

    $array_languages_id = [];

      foreach ($already_selected_languages as $key) {
        $array_languages_id[] = $key->languages_known_id;
      }

      /**
        * Two type of situations are handled here.
        * -- Firstly -> removes the skills user has already Saved
        * -- Secondly -> removes the skills that user has chosen to be updated/saved
      **/
      $result = DB::table('languages_known')
      ->where([
        ['languages_known', 'like', '%'.$request['search'].'%'],
        ['id', 'NOT LIKE', $request['not_like']]
        ])
        ->whereNotIn('id', $array_languages_id)
        ->limit(4)
        ->get();

        foreach($result as $value) {
          echo "<li id=".$value->id.">$value->languages_known</li>";
        }

  }

});

Route::post('/add/languages', function(Request $request){

  $array = array_unique (array_merge ($request['languages_known_set'], $request['items_added']));

  $result = DB::table('languages_known')->whereNotIn('id', $array)->limit(1)->get();

  foreach($result as $value) {
    echo "<li id=".$value->id.">$value->languages_known</li>";
  }
});

Route::post('{username}/add/languages', function(Request $request){
  if($request->ajax()){
    DB::table('languages_known_user')->insert([
      ['user_id' => Auth::user()->id, 'languages_known_id' => $request['id']]
    ]);
  }
});




Route::get('/register/student/check', 'UserController@userInviteCheck');

Route::get('/register/student', function(Request $request){
    $college_id = $request['college_id'];
    $email = $request['email'];
    $status = $request['status'];
    $check = DB::table('invitations')->where([
      ['college_id', '=', $request['college_id']],
      ['invite_email', '=', $request['email']]
      ])->first();

    $checkToken = Invitation::where(DB::raw('BINARY `token`'), $request['token'])->first();

    if(!$check || !$checkToken){
      return redirect()->route('dashboard');
    }
    else{
      $college = RegisterCollege::where('college_id', $college_id)->firstOrFail();
      return view('user.register')->with(['college_id' => $college_id, 'email' => $email, 'college' => $college, 'status' => $status]);
    }
})->name('user.register');

  Route::post('register/student', 'UserController@userSignup')->name('user.register');

  Route::get('register/student/course', 'UserController@getUserCourses');



Route::get('/{username}/resume', function($username){
  $user = User::where('username', $username)->firstOrFail();
  return view('college.resume')->with(compact('user'));
});

Route::get('/college/setup', function(){
  return view('college.setup');
})->name('setup');



Route::get('/ajax/post/comments/{postId}', 'PostsController@getComments');

Route::post('/ajax/post', 'PostsController@ajaxPost')->name('postAjax');

Route::get('newpost/user', function(){
  $newPost = DB::table('posts')->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->first();
  return view('post.newPostByUser')->with(compact('newPost'));
});

Route::get('post/edit/{post_id}/{post_content}', 'PostsController@getEditPost');

Route::post('post/react', 'PostsController@reactPost')->name('react');

Route::post('post/react/like/{user_id}/{post_id}', 'LikeController@reactLike')->name('reactLike');

Route::post('post/react/comment/{user_id}/{post_id}/{comment}', 'CommentController@reactComment')->name('reactComment');

// Route::post('checkstatus/{id}', 'CheckStatusController@updateStatus');
//
// Route::get('checkstatus/usersonline/{id}', 'CheckStatusController@usersOnline');
