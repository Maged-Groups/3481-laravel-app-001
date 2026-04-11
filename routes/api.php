<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('about', function () {
 return 'welcome to about us page';
});

Route::get('contact -us', function () {
    return  view ('static.about.index');
});
//Route::get('services', function () {
   // return view ('static.services.all-services');
 //});
 
route::view( 'services','static.services.all-services');
//route::redirect('all-services','services');


Route::prefix('products')->group(function () {

    Route::view('/', 'products.all-products');
    Route::view('/electronics', 'products.electronics');
    Route::view('/homecare', 'products.homecare');

    Route::post('/', function (Request $request) {
        return $request->all();
    });

    Route::put('/{id}', function (Request $request, $id) {
        return [
            'id' => $id,
            'data' => $request->all()
        ];
    });

    Route::delete('/{id}', function ($id) {
        return "Deleting product with id: $id";
    });

    Route::get('/{id}', function ($id) {
        return "Product id is: " . $id;
    })->whereNumber('id');

    Route::get('by-category/{category}',function($category){
        return" i well all products in $category section ";
    })->whereAlpha('category');

});

Route::view('types','types\alltypes');
Route::view('laptobtypes','types/laptobtypes');
Route::view('phonetypes','types\phonetypes');

Route::prefix('Transportation')->group(function(){
Route::View('ships','transportation\ships');
Route::view('cars','transportation\cars');
Route::view('trains','transportation\trains');

});

route::fallback(function(){
    return view ('page-404');

});
Route::get('/contact', function () {
    return view('contact');
});

route::get('contact',function(){
   return ("cotact is ");
});
Route::get('users',function(){
    return('all users');
});
Route::get('users/{$id}',function($id){
    return('user number is $id');
});
Route::get('users/{user}',function($user){
    return('user number is $user');
});
Route::prefix('Shipping companies')->group(function () {
   
    Route::post('/', function (Request $request) {
        return $request->all();
    });

    Route::put('/{id}', function (Request $request, $id) {
        return [
            'id' => $id,
            'data' => $request->all()
        ];
    });

    Route::delete('/{id}', function ($id) {
        return "Deleting companies with id: $id";
    });

    Route::get('/{id}', function ($id) {
        return " companies id is: " . $id;
    })->whereNumber('id');

    Route::get('special-companies/{companies}',function($companies){
        return" i well all product in $companies section ";
    })->whereAlpha('companies');

});