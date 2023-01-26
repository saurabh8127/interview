<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request){
		// dd(Auth::guard('LaravelAuthApp')->check());
		$validated = Validator::make($request->all(),[
			'email'     => 'required|string|email|max:255',
			'password'  => 'required|string|min:6|max:64', 
		]);
		if($validated->fails()){
			return response()->json(array(
				'data' => array(),
				'status' => false,
				'message' => array('Enter valid value')
			), 400);
		}else{
			if (Auth::attempt($request->only('email', 'password'))) {

				$token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
			 
				return response()->json(array(
					'data' => $token,
					'status' => true,
					'message' => array('login, welcome')
				), 200);
			} else {
				return response()->json(array(
					'data' => array(),
					'status' => false,
					'message' => array('Your email is not verified!')
				), 400);
			}     
		}
	}
}
