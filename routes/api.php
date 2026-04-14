<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
CustomerController,
EmployeeController,
ShipperController
};

route::prefix('customers')->controller(CustomerController::class)->group(function(){
route::get('names','names');
route::get('store','storee');
//route::get('show/{id}',function($id){return "showing $id";});
route::get('show/{id}','show'); //bdal ma el function cant hena b2et fel customer controller


}); 
route::apiresources(
[
'customers'=>CustomerController::class,
'employees'=>EmployeeController::class,
'shippers'=>ShipperController::class,


]);

route::fallback(function(){
return view('page-404');

});