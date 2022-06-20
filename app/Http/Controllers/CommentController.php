<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function reactComment($user_id, $post_id, $comment){
      $commented = new Comment();

      $commented->user_id = $user_id;
      $commented->post_id = $post_id;
      $commented->comment = $comment;

      $commented->save();

    }
}
