<?php

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    Mail::to('magedyaseengroups@gmail.com')->send(new WelcomeMail);
});
