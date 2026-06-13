<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\InitController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostStatusController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\ReactionTypeController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('forget-password', 'forget_password');
    Route::post('reset-password', 'reset_password');
});

// Init
Route::prefix('init')->controller(InitController::class)->group(function () {
    Route::get('all', 'all');
    Route::get('migrations', 'migrations');
    Route::get('controllers', 'controllers');
    Route::get('models', 'models');
    Route::get('resources', 'resources');
});

// Private Routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResources([
        'comments' => CommentController::class,
        'posts' => PostController::class,
        'reactions' => ReactionController::class,
        'replies' => ReplyController::class,
        'users' => UserController::class,
    ]);

    // Admins Only Routes
    Route::middleware(['hasRole:user,viewer'])->group(function () {
        Route::apiResources([
            'reaction-types' => ReactionTypeController::class,
            'post-statuses' => PostStatusController::class,
        ]);
    });

    // Auth
    Route::prefix('auth')->controller(AuthController::class)->group(function () {
        Route::post('change-password', 'change_password');
        Route::get('active-sessions', 'active_sessions');
        Route::get('logout-session/{id}', 'logout_session');
        Route::get('logout-current', 'logout_current');
        Route::get('logout-others', 'logout_others');
        Route::delete('logout-all', 'logout_all');
    });
});
