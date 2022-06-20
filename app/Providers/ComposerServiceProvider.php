<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Route;
use DB;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', 'App\Http\ViewComposers\ChapterComposer');
        view()->composer('*', function ($view)
        {
          $view->with('userChapterInfo', 'UserController@userChapter');
        });
        // View::composer('*', function($view){
        //   $username = Route::current()->parameter('username');
        //   if($username !== null){
        //     $check = DB::table('users')->where('username', $username)->first();
        //     $view->with('username', $username);
        //     $view->with('check', $check);
        //
        //     $userChapter = DB::table('users')->where('username', $username)->first();
        //     $view->with(compact('userChapter'));
        //
        //     // $userid = $userChapter->id;
        //     // // $userid = Auth::User()->id;
        //     // $collegeid = DB::table('users')->where('id', $userid)->first();
        //     // $college_id = $collegeid->college_id;
        //     // $college_info = DB::table('register_colleges')->where('college_id', $college_id)->first();
        //     // $view->with('college_info', $college_info);
        //     //
        //     // //user basic information
        //     // $userinfo = DB::table('userinfo')->where('user_id', $userid)->first();
        //     // $view->with(compact('userinfo'));
        //   }
        // });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
