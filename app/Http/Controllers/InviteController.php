<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;

class InviteController extends Controller
{

    private $randomString;

    public function generateRandomString($length = 20) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
        }
      return $randomString;
    }

    public function inviteUser(Request $request){
      $college_id = $request['college_id'];
      $email = $request['email'];
      $status = $request['status'];
      $token = $this->generateRandomString();

      $invite = new Invitation();

      $invite->college_id = $college_id;
      $invite->invite_email = $email;
      $invite->status = $status;
      $invite->token = $token;

      // $invite->save();

      if($invite->save()){
        echo 'success';
      }
      else{
        echo 'failure';
      }

    }
}
