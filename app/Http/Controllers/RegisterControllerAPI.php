<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterControllerAPI extends Controller
{
    public function register(Request $request){

    	 $rules = [
        'name' => 'unique:users|required',
        'email'    => 'unique:users|required',
       'password' => 'required',
    ];

    $input     = $request->only('name', 'email', 'password');
    $validator = Validator::make($input, $rules);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'error' => $validator->messages()]);
    }
    $name = $request->name;
    $email    = $request->email;
    $password = $request->password;
   $api_token =   Str::random(60);
    $user     = User::create([
    	'name' => $name, 
    	'email' => $email,
    	 'password' => Hash::make($password),
    	 'api_token' => $api_token
    	]);

 return response()->json(['success' => true, 'msg' =>"registration sucessfull"]);
    }
}
