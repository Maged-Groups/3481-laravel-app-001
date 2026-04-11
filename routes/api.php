<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('about', function () {
    return 'Welcome to about us page';
});

Route::view('contact-us', 'static.contact.index');
Route::redirect('contacts', 'contact-us', 301);

Route::prefix('services')->group(function () {
    Route::view('/', 'static.services.all-services');
    Route::view('shipping', 'static.services.shipping');
    Route::view('transport', 'static.services.transport');
    Route::view('delivery', 'static.services.delivery');
    Route::get('list', function () {
        return 'A list of our services are here...';
    });
});

Route::prefix('products')->group(function () {

    Route::get('/', function () {
        return 'A list of our products are here...';
    });

    Route::get('{product}', function ($product) {
        return "Product $product Page";
    })->whereNumber('product');

    Route::post('/', function (Request $request) {
        return $request;
    });

    Route::put('{product}', function (Request $request, $product) {
        return [
            'Request Data' => $request->all(),
            'Product ID' => $product,
        ];
    });

    Route::delete('{product}', function ($product) {
        return "Deleting {$product}...";
    });

    Route::get('by-category/{category}', function ($category) {
        return "I will list all products in $category section";
    })->whereAlpha('category');

    // Instead of using this method
    // Route::get('new-arrivals/sat', function ($day) {
    //     return "A list of products arrived last $day";
    // });
    // Route::get('new-arrivals/sun', function ($day) {
    //     return "A list of products arrived last $day";
    // });
    // Route::get('new-arrivals/mon', function ($day) {
    //     return "A list of products arrived last $day";
    // });
    // Route::get('new-arrivals/tue', function ($day) {
    //     return "A list of products arrived last $day";
    // });
    // Route::get('new-arrivals/wed', function ($day) {
    //     return "A list of products arrived last $day";
    // });
    // Route::get('new-arrivals/thu', function ($day) {
    //     return "A list of products arrived last $day";
    // });
    // Route::get('new-arrivals/fri', function ($day) {
    //     return "A list of products arrived last $day";
    // });

    // use this method

    Route::get('new-arrivals/{day}', function ($day) {
        return "A list of products arrived last $day";
    })->whereIn('day', ['sat', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri']);

});

Route::fallback(function () {
    return view('page-404');
});


Route::prefix('shippers')->group(function () {
    Route::get('/', function () { return 'A list of all shippers...'; });
    Route::get('{country}/{city}', function ($country, $city) {
        if ($city) {
            return "Searching for shippers in $country / $city";
        }
       
    });
    Route::get('{shipper}', function ($shipper) { return "Shipper $shipper Page"; })->whereNumber('shipper');
    Route::post('/', function (Request $request) { return $request->all(); });
    Route::put('{shipper}', function (Request $request, $shipper) {
        return ['Request Data' => $request->all(), 'Shipper ID' => $shipper];
    });
    Route::delete('{shipper}', function ($shipper) { return "Deleting shipper {$shipper}..."; });
});