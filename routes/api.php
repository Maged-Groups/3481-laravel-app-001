<?php


//Use App\Http\Controllers\EmployeeController;
//use App\Http\Controllers\TaskController;
use Faker\Provider\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SuplierController,
    CustomerController,
    EmployeeController,
     ShiperController
};




//Route::get('/user', function (Request $request) {
  //  return $request->user();//
//})->middleware('auth:sanctum');



//Route::get('about', function () {
    return 'welcome to about us page';
//});

//Route::get('contact -us', function () {
    return view('static.about.index');
//});
//Route::get('services', function () {
// return view ('static.services.all-services');
//});

//route::view('services', 'static.services.all-services');
//route::redirect('all-services','services');


//Route::prefix('products')->group(function () {

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

    Route::get('by-category/{category}', function ($category) {
        return " i well all products in $category section ";
    })->whereAlpha('category');

//});

Route::view('types', 'types\alltypes');
Route::view('laptobtypes', 'types/laptobtypes');
Route::view('phonetypes', 'types\phonetypes');

Route::prefix('Transportation')->group(function () {
    Route::View('ships', 'transportation\ships');
    Route::view('cars', 'transportation\cars');
    Route::view('trains', 'transportation\trains');

});


Route::get('/contact', function () {
    return view('contact');
});

route::get('contact', function () {
    return ("cotact is ");
});
Route::get('users', function () {
    return ('all users');
});
Route::get('users/{$id}', function ($id) {
    return ('user number is $id');
});
Route::get('users/{user}', function ($user) {
    return ('user number is $user');
});
Route::prefix('shipping-companies')->group(function () {

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
        return "Deleting companie with id: $id";
    });

    Route::get('/{id}', function ($id) {
        return " companie id is: " . $id;
    })->whereNumber('id');

    Route::get('special-companies/{companies}', function ($companies) {
        return " i well all product in $companies section ";
    })->whereAlpha('companies');

});

// Route::get('task',function(){
// ?>
//<h1>all task</h1>

//
<?php
//});

//Route::prefix('tasks')->group(function(){

//Route::get('/','App\Http\Controllers\TaskController@index');

//Route::get('/',['TaskController::Class','index']);

// });
//Route::resource('employyes','EmployyeController::class');
//Route::resource('supliers','SuplierController::class');

//Route::apiResource('employyes','EmployyeController::class');


Route::prefix('customers')->Controller(CustomerController::class)->group(function(){
    Route::git('name','name');
     Route::git('number','number');
      Route::git('addres','addres');
       Route::git('email','email');

});


Route::prefix('supliers')->Controller(SupliersController::class)->group(function(){
    Route::git('name','name');
     Route::git('number','number');
      Route::git('addres','addres');
       Route::git('email','email');

});



Route::prefix('employyes')->Controller(EmployyesController::class)->group(function(){
    Route::git('name','name');
     Route::git('number','number');
      Route::git('addres','addres');
       Route::git('email','email');

});


Route::prefix('shipers')->Controller(ShiperController::class)->group(function(){
    Route::git('name','name');
     Route::git('number','number');
      Route::git('addres','addres');
       Route::git('email','email');

});




Route::apiResources([
    'customers' => 'CustomerController::Class',
    'supliers' => 'SuplierController::class',
    'employyes' => 'EmployyeController::class',
    'shipers' => 'ShiperController::class',
]);

route::fallback(function () {
    return view('page-404');

});




