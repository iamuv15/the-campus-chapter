<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserInfoController extends Controller
{
    public function userInfoUpdate(Request $request){
      $id = Auth::User()->id;
      $reg_no = $request['reg_no'];
      $roll_no = $request['roll_no'];
      $branch = $request['branch'];
      $batch = $request['batch'];
      $trade = $request['trade'];
      $semester = $request['semester'];
      $contact_no = $request['contact_no'];
      $hostel_no = $request['hostel_no'];
      $room_no = $request['room_no'];

      $userInfo = new UserInfo();

      $userInfo->user_id = $id;
      $userInfo->registration_number = $reg_no;
      $userInfo->roll_number = $roll_no;
      $userInfo->branch = $branch;
      $userInfo->batch = $batch;
      $userInfo->trade = $trade;
      $userInfo->semester = $semester;
      $userInfo->contact_number = $contact_no;
      $userInfo->hostel_number = $hostel_no;
      $userInfo->room_number = $room_no;

      $userInfo->save();

      return redirect()->route('chapter');

    }

    public function chapter(){
      return view('/chapter');
    }
}
