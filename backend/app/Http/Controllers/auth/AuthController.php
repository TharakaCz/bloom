<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function login(Request $request){

        $rules = Validator::make($request->all(), [
            "email" => ["required", "email"],
            "password" => ["required", "string", "min:5"],
        ]);

        if($rules->fails()){
            return response()->json($rules->errors(), 401);
        }

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            // successfull authentication
            $user = Auth::user();

            $user_token = $user->createToken('appToken')->accessToken;

            return response()->json([
                'success' => true,
                'token' => $user_token,
                'user' => $user,
                'role' => User::find($user->id)->roles,
                'permission' => User::find($user->id)->roles->permissions,
            ], 200);
        } else {
            // failure to authenticate
            return response()->json([
                'success' => false,
                'message' => 'Failed to authenticate.',
            ], 401);
        }
    }

    public function registration(){

    }

    public function refresh(){

    }

    public function logout(){

    }
}
