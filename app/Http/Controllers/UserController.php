<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
use App\Invitation;
use DB;
use View;

class UserController extends Controller
{
    // User signIn controller function

  public $successStatus = 200;

  function getdashboard(){
    return view('index');
  }

  public function userSignin(Request $request){
    if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
      // DB::table('users')->where('email', $request['email'])->update(['last_active' => NOW()]);
      return redirect()->route('dashboard');
    }

    // if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
    //       $user = Auth::user();
    //       $success['token'] =  $user->createToken('Laravel Password Grant Client')->accessToken;
    //       // return response()->json(['success' => $success], $this->successStatus);
    //   }
    //   else{
    //       return response()->json(['error'=>'Unauthorised'], 401);
    //   }

    return redirect()->route('dashboard');
  }

  // User signUp controller function
  public function userSignup(Request $request){

    if(DB::table('invitations')->where('invite_email', '=', $request['email'])->value('college_id') == $request['college_id']){
      if(isset($request['register_new'])){
        $email = $request['email'];
        $fname = $request['fname'];
        $mname = $request['mname'];
        $lname = $request['lname'];
        $username = $request['username'];
        $pwd = $request['password'];
        $cnfpwd = $request['cnfpwd'];
        $clgid = $request['college_id'];

        if($pwd == $cnfpwd){
          $pwd = bcrypt($request['password']);

          $user = new User();
          $user->college_id = $clgid;
          $user->first_name = $fname;
          $user->middle_name = $mname;
          $user->last_name = $lname;
          $user->email = $email;
          $user->password = $pwd;
          $user->username = $username;
          $user->remember_token = $request['_token'];


          $user->save();

          $id = DB::table('users')->where('username', '=', $username)->value('id');
          $reg_no = $request['registration_number'];
          $program_enrolled = $request['program_enrolled'];
          $batch = $request['batch'];
          $course = $request['course'];
          $semester = $request['semester'];
          $contact_no = $request['contact_number'];

          $userInfo = new UserInfo();

          $userInfo->user_id = $id;
          $userInfo->registration_number = $reg_no;
          $userInfo->batch = $batch;
          $userInfo->semester = $semester;
          $userInfo->contact_number = $contact_no;

          $insertPivot = DB::table('course_program_user')->insert([
            ['user_id' => $id, 'program_id' => $program_enrolled, 'course_id' => $course]
          ]);

          $userPivot->program_enrolled = $program_enrolled;
          $userPivot->course = $course;

          if($userInfo->save() && $insertPivot){
            Auth::login($user);

            return redirect()->route('dashboard');
          }
          else {
            // delete the entry of the user in the users table.
            return 'Something went wrong! Try again later.';
          }
        }
        else {
          echo 'Password does not match!';
        }
      }
      else {
        echo 'You have not submitted the form';
      }
    }
    else {
      echo 'Don\'t mess around!';
    // return redirect()->back();
    }
}


  public function logout(){
    if(Auth::logout()){
      return redirect()->route('dashboard');
    }
    return redirect()->route('dashboard');
  }

  public function checkAuthentication(){
    if(Auth::check()){
      return redirect()->back();
    }
  }

  public function userInviteCheck(Request $request){

    $check = DB::table('invitations')->where([
      ['college_id', '=', $request['collegeId']],
      ['invite_email', '=', $request['email']]
      ])->first();
    $checkToken = Invitation::where(DB::raw('BINARY `token`'), $request['token'])->first();
    if(!$check || !$checkToken){
      echo 'You have not been invited yet!';
    }
    else if($check && $checkToken){

      if(!DB::table('invitations')->where('invite_email', '=', $request['email'])->value('status') == 1){
        echo 'You already have an account with us!';
      }
      else{
        return redirect()->route('user.register', ['college_id='.$request['collegeId'], 'email='.$request['email'], 'token='.$request['token']]);
      }
    }
  }

  public function getUserCourses(Request $request){
    if($request->ajax()){

      $courses = DB::table('course_program_register_college')->where([
        ['college_id', '=', $request['college_id']],
        ['program_id', '=', $request['selected_option']]
      ])->get();

      $courseArray = [];

      foreach($courses as $course){
        $courseDetails = DB::table('courses')->where('id', '=', $course->course_id)->first();
        array_push($courseArray, array('course_id' =>  $courseDetails->id, 'course_name' => $courseDetails->course_name ));
      }
      $courses = json_encode($courseArray);
    }
    return $courses;
  }

  // public function userChapter($username){
  //   return View('chapter');
  // }
}
