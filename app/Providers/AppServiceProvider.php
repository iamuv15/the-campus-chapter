<?php

namespace App\Providers;

use View;
use Schema;
use Illuminate\Support\ServiceProvider;
use App\User;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // $userInfo = User::find(Auth::id())->first();
        // View::share('first_name', $userInfo->first_name);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
