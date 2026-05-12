<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        $auth = Auth::attempt($credentials);

        if ($auth) {
            $user = auth()->user();
            $abilities = [$user->roles];
            $token = $user->createToken('login', $abilities)->plainTextToken;

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

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $abilities = 'guest';
        $data['roles'] = $abilities;

        $user = User::create($data);

        $token = $user->createToken('login', [$abilities])->plainTextToken;

        $user->token = $token;

        return $user;

    }

    public function forget_password() {}

    public function reset_password() {}

    public function change_password(ChangePasswordRequest $request)
    {
        $user = auth()->user();

        $hashed = $user->password;

        if (Hash::check($request->current_password, $hashed)) {

            $user['password'] = $request->new_password;

            if ($user->save()) {
                return 'Password changed successfully';
            }

            return 'Cannot change the password at the moment!!!';

        }

        return 'Wrong Password!!!';
    }

    public function active_sessions() {}

    public function logout_session() {}
    
    public function logout_current() {}
    
    public function logout_others() {}
    
    public function logout_all() {}
}
