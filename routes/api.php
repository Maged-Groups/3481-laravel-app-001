<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TaskController,
    EmployeeController,
    ProductController
};

Route::prefix('tasks')->group(function () {
    // Route::get('/', 'App\Http\Controllers\TaskController@index');

    // Route::get('/create', 'App\Http\Controllers\TaskController@create');

    // Route::post('/', 'App\Http\Controllers\TaskController@store');

    // Route::get('/{task}', 'App\Http\Controllers\TaskController@show');

    // Route::get('/{task}/edit', 'App\Http\Controllers\TaskController@edit');

    // Route::put('/{task}', 'App\Http\Controllers\TaskController@update');

    // Route::delete('/{task}', 'App\Http\Controllers\TaskController@destroy');

    // OR
    // Route::get('/', [TaskController::class, 'index']);
    // Route::get('/create', [TaskController::class, 'create']);
    // Route::post('/', [TaskController::class, 'store']);
    // Route::get('/{task}', [TaskController::class, 'show']);
    // Route::get('/{task}/edit', [TaskController::class, 'edit']);
    // Route::put('/{task}', [TaskController::class, 'update']);
    // Route::delete('/{task}', [TaskController::class, 'destroy']);
});

// OR
// Route::prefix('tasks')->controller(TaskController::class)->group(function () {
//     Route::get('/', 'index');
//     Route::get('/create', 'create');
//     Route::post('/', 'store');
//     Route::get('/{task}', 'show');
//     Route::get('/{task}/edit', 'edit');
//     Route::put('/{task}', 'update');
//     Route::delete('/{task}', 'destroy');
// });
// OR
// Route::resource('tasks', TaskController::class);
// Route::resource('employees', EmployeeController::class);


// Route::apiResource('tasks', TaskController::class);
// Route::apiResource('employees', EmployeeController::class);

Route::fallback(function () {
    return view('page-404');
});
