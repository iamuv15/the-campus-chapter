<?php

namespace App\Http\Controllers;

use DB;
use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function reactLike($user_id, $post_id)
    {
        // check if already liked!
        if($id = DB::table('likes')->where([
          ['user_id', '=', $user_id],
          ['post_id', '=', $post_id]
        ])->first() !== NULL){
          // the post is already liked so unlike the post
          DB::table('likes')->where([
            ['user_id', '=', $user_id],
            ['post_id', '=', $post_id]
          ])->delete();

          return redirect()->route('dashboard');
        }
        else{
          // like the post
          // DB::table('likes')->insert(
          //   ['user_id' => $user_id,
          //    'post_id' => $post_id
          //   ]
          // );

          $like = new Like();

          $like->user_id = $user_id;
          $like->post_id = $post_id;

          $like->save();

          return redirect()->route('dashboard');


        }

        // $count = DB::table('likes')->where([
        //   ['post_id', '=', $post_id]
        // ])->count();
        //
        // echo 'hello';

        // echo $count;
    }
}
