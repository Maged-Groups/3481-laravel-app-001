<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        $auth = Auth::attempt($credentials);

        if ($auth) {
            $user = auth()->user();
            $abilities = [$user->roles];
            $token = $user->createToken('login', $abilities )->plainTextToken;

            // Method 1: Generate array of user and token

            // return [
            //     'token' => $token,
            //     'user' => $user,
            // ];

            // Method 2:Generate array of user and token
            $user->token = $token;

            return $user;

        } else {
            return response('User not exists');
        }

        // return $credentials,;
    }

    public function register() {}

    public function forget_password() {}

    public function reset_password() {}

    public function change_password() {}

    public function active_sessions() {}

    public function logout_all() {}

    public function logout_current() {}

    public function logout_others() {}
}
