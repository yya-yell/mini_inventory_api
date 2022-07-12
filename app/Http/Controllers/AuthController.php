<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() 
    {
        $data = request()->validate([
            'email' => ['required' , 'email'],
            'password' => ['required'],
        ]);
        if (!Auth::attempt($data)) {
            return response()->json('incorrect credentials' , 401);
        }
        $access_token = Auth::user()->createToken('AccessToken')->accessToken;
        return response()->json([
            'token' => $access_token
        ]);
    }

    public function auth()
    {
        return request()->user();
    }

    public function logout()
    {
        request()->user()->token()->revoke();
        return auth('web')->logout();
    }
}
