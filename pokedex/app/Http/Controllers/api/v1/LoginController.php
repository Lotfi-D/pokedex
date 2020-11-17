<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;




class LoginController extends Controller {
    
    public function login( Request $request ){
        $login = $request->validate([
            'email' => 'required|string',
            'password'=>'required|string'
        ]);
          
        if( !Auth::attempt( $login )){
            return response(['message' => 'Invalid login credentials.']);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return response([ 'token' => $accessToken]); //'user' => Auth::user(),
        }
    
   
    public function register( Request $request){
                   
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required',
            ]);
            if ($validator->fails())
            {
                return response(['errors'=>$validator->errors()->all()], 422);
            }
            $request['password']=Hash::make($request['password']);
            $request['remember_token'] = Str::random(10);
            $user = User::create($request->toArray());
            return response(['message' => 'Vous êtes maintenant dresseur de pokemon!'], 200);
    }

    public function logout (Request $request) {
        if (Auth::check()) {
            $user = Auth::user()->token();
            $user->revoke();
            return ('logged out');
         }
    }


}
