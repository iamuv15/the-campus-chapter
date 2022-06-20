<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Post;
use DB;

/**
 * Composer class used to render data in different views within chapter directory
 */
class ChapterComposer
{
  function compose(View $view)
  {

    if(Auth::check()){

      //the variable authUser is accessable everywhere with authenticated user information
      $view->with('authUser', Auth::user());



      // College info

    }
  }
}


?>
