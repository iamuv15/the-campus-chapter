<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\RegisterCollege;
use App\User;
use DB;

class RegisterColleges extends Controller
{
    public function newCollegeRegister(Request $request){
      $clg_name = $request['clg_name'];
      $abbr = $request['abbr'];
      $fname = $request['fname'];
      $mname = $request['mname'];
      $lname = $request['lname'];
      $email = $request['email'];
      $token = $request['_token'];
      $pwd = $request['pwd'];
      $cnfpwd = $request['cnfpwd'];

      if($pwd == $cnfpwd){

        $newCollege = new RegisterCollege();

        $newCollege->college_name = $clg_name;
        $newCollege->abbrivation = $abbr;

        $newCollege->save();

        $clg_id = DB::table('register_colleges')->where('college_name', '=', $clg_name)->value('college_id');

        $pwd = bcrypt($request['pwd']);

        $newUser = new User();

        $newUser->first_name = $fname;
        $newUser->middle_name = $mname;
        $newUser->last_name = $lname;
        $newUser->email = $email;
        $newUser->password = $pwd;
        $newUser->remember_token = $token;
        $newUser->status = 3;
        $newUser->college_id = $clg_id;

        if($newUser->save()){
          Auth::login($newUser);
          return redirect()->route('setup');
        }
        else {
          echo 'Something went wrong while registering you. Try again later.';
        }
      }
    }

    public function landingpage(){
      return view('/');
    }

    function register(){
      if(Auth::check()){
        return redirect()->back();
      } else {
        return redirect()->route('registerCollege');
      }
    }

    public function register_college(){
      return view('register_college');
    }
}
