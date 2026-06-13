<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ForgetPasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        $auth = Auth::attempt($credentials);

        if ($auth) {
            $user = auth()->user();
            $abilities = $user->roles;
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
        $abilities = ['guest'];
        $data['roles'] = $abilities;

        $user = User::create($data);

        $token = $user->createToken('login', [$abilities])->plainTextToken;

        $user->token = $token;

        return $user;

    }

    public function forget_password(ForgetPasswordRequest $request)
    {

        $email = $request->email;

        $user = User::where('email', $email)->first();
        $token = Password::createToken($user);

        $expireMinutes = '10';
        $userName = $user->name;
        $resetUrl = "https://www.mywebsite.com/reset-password?token=$token";

        if (Mail::to($email)->send(new ForgetPasswordMail($userName, $email, $expireMinutes, $resetUrl))) {
            return 'You have received a reset password email, please check your inbox.';
        } else {
            return 'Cannot reset your email at the moment, please reload the page and try again.';
        }
    }

    public function reset_password(ResetPasswordRequest $request)
    {
        $credentials = $request->validated();

        $user = User::where('email', $credentials['email'])->first();

        $result = Password::reset($credentials, function ($user, $new_password) {

            $user->password = $new_password;

            if ($user->save()) {
                return true;
            }

            return fasle;

        });

        if ($result = 'passwords.reset') {
            return 'Passwrd reset successfully';
        }

        return 'Cannot reset the password....';
    }

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

    public function active_sessions()
    {
        $current = auth()->user()->currentAccessToken();

        return [
            'current' => $current,
            // 'all' => $all,
        ];
    }

    public function logout_session(int $id)
    {
        $session = auth()->user()->tokens()->where('id', $id)->first();

        if ($session && $session->delete()) {
            return 'Selected session was revoked successfully';
        }

        return 'Cannot revoke selected session';
    }

    public function logout_current()
    {
        if (auth()->user()->currentAccessToken()->delete()) {
            return 'Logged out successfully';
        }

        return 'Cannot Log out now';
    }

    public function logout_others()
    {
        $current = auth()->user()->currentAccessToken()->id;

        $deleted = auth()->user()->tokens()->whereNot('id', $current)->delete();

        if ($deleted) {
            return 'All other sessions were closed successfully';
        }

        return 'Cannot log out from all you sessions at the moment, please try again later';
    }

    public function logout_all()
    {
        if (auth()->user()->tokens()->delete()) {
            return 'Logged out from all accounts';
        }

        return 'Cannot log out at the moment, please try again in few seconds.';

    }
}
