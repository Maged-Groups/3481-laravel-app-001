<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TaskController,
    EmployeeController,
    ProductController
};

// Extra Routes
Route::prefix('employees')->controller(EmployeeController::class)->group(function() {
    Route::get('withdraw', 'withdraw');
    Route::get('candidate', 'candidate');
    Route::get('new', 'new');
    Route::get('training', 'training');
    Route::get('vacations', 'vacations');
    Route::get('day-off', 'dayOff');
    Route::get('permissions/{type}', 'permissions');
});

// API Routes
Route::apiResources([
    'tasks' => TaskController::class,
    'employees' => EmployeeController::class,
    'products' => ProductController::class,
]);

Route::fallback(function () {
    return view('page-404');
});
