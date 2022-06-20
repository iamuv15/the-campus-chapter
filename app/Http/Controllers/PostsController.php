<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use LikeController;
use DB;

class PostsController extends Controller
{
    public function submit(Request $request){
      $this->validate($request, [
        'message' => 'required'
      ]);

      return 'Successful Submission!';
    }

    public function ajaxPost(Request $request){
      $msg = $request['description_name'];
      $userid = Auth::User()->id;

      $post = new Post();

      $post->user_id = $userid;
      $post->post_message = $msg;

      $post->save();

      return redirect()->route('dashboard');

    }

    // Fetches the post message and post id of the post to be edited.
    public function getEditPost(Request $request){
      $post_id = $request['post_id'];
      $post_content = $request['post_content'];

      return view('inc.test')->with(compact('post_id', 'post_content'));
    }

    public function ajaxGet(Request $request){
      if(Auth::check()){
        $posts = Post::orderBy('post_id', 'desc')->simplePaginate(2);
        $authUser = DB::table('users')->where('id', '=', Auth::user()->id);
        if($request->ajax()){
          return [
            'posts' => view('post.post-container')->with(compact('posts'))->render(),
            'next_page' => $posts->nextPageUrl()
          ];
        }

        return view('index')->with(compact('posts', 'authUser'));
      }
      else{
        return view('index');
      }
    }

    public function getComments(Request $request){
      // $posts = Post::orderBy('post_id', 'desc')
      $postId = $request['postId'];
      // $commentId = $request['commentId'];

      $comments = DB::table('comments')->where('post_id', '=', $postId)->orderBy('updated_at', 'desc')->simplePaginate(2);

      if($request->ajax()){
        return [
          'comments' => view('post.comments')->with(compact('comments'))->render(),
          'next_page' => $comments->nextPageUrl()
        ];
      }

      return view('post.comments')->with(compact('comments'));
    }

    // public function newPostByUser(){
    //   $newPost = DB::table('posts')->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->first();
    //   return view('post.newPostByUser')->with(compact('newPost'));
    // }

}
