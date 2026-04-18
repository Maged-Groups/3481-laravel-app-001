<?php

use App\Http\Controllers\InitController;
use Illuminate\Support\Facades\Route;

// Init
Route::prefix('init')->controller(InitController::class)->group(function () {
    Route::get('migrations', 'migrations');
});
