<?php

// namespace App\Http\Controllers\API;

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::get('/', function() {
//   return view('index');
// });
// Route::post('login', 'API\UserController@userSignIn')->name('login');
// Route::get('login', function(){
//   echo 'you cannot view the contents without verifying your identity!';
// });
//
Route::get('/posts', 'API\PostsController@index')->name('posts')->middleware('auth:api');


// Route::middleware('auth:api')->get(function() {
//     return $request->user();
// });
