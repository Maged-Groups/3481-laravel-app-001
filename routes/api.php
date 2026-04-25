<?php

use App\Http\Controllers\InitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CommentController,
    PostController,
    PostStatusController,
    ReactionController,
    ReactionTypeController,
    ReplyController,
    UserController,
};

// Init
Route::prefix('init')->controller(InitController::class)->group(function () {
    Route::get('all', 'all');
    Route::get('migrations', 'migrations');
    Route::get('controllers', 'controllers');
    Route::get('models', 'models');
});

Route::apiResources([
    'comments' => CommentController::class,
    'posts' => PostController::class,
    'posts-statuses' => PostStatusController::class,
    'reactions' => ReactionController::class,
    'reaction-types' => ReactionTypeController::class,
    'replies' => ReplyController::class,
    'users' => UserController::class,
]);