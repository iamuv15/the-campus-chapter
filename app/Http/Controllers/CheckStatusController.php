<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CheckStatusController extends Controller
{
    public function updateStatus($id){
      if(DB::table('users')->where([['id', '=', $id],['is_online', '=', '1']])->first()){
        // Updating users table after every 10 seconds to check if user is active
        DB::table('users')->where('id', $id)->update(['last_active' => NOW()]);
        return 'hello';
      } else {
        DB::table('users')->where('id', $id)->update(['is_online' => 1]);
      }
    }

    public function usersOnline($id){
      return DB::table('users')->where('is_online', '=', 1)->whereNotIn('id', [$id])->get();
    }
}
