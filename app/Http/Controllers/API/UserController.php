<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Cookie;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Session;

class UserController extends Controller
{
    public function userSignIn(Request $request){
      if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){

        $http = new \GuzzleHttp\Client;

        $response = $http->post('http://tcc.devp/oauth/token', [
            'form_params' => [
            'grant_type' => 'password',
            'client_id' => 2,
            'client_secret' => 'ny4JSJ6VSsoWxIEjDuvlerNGmLyG6q9t1GnL638g',
            'username' => $request['email'],
            'password' => $request['password'],
            'scope' => '*'
            ],
        ]);
        $response_array = json_decode((string) $response->getBody()->getContents(), true);

        $accessToken = $response_array['access_token'];
        $refreshToken = $response_array['refresh_token'];

        $a = cookie('accessToken', $accessToken, 60);
        $b = cookie('refreshToken', $refreshToken, 60);

        $value = $request->cookie('accessToken');
        
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
}
