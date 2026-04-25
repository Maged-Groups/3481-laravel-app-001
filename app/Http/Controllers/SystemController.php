<?php

namespace App\Http\Controllers;

use Artisan;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    private $models=[
        'hospital',
        'library',
        'school',
        'cinama',
        'cafe,'
        
    ];
    public function model(){
    foreach($this->models as $model)
    Artisan::call('make:model',[
    'name'=>'$model',
      '-a'=>true,
]);     
 } public function controllers(){
  $classes=[
    'hospital',
        'library',
        'school',
        'cinama',
        'cafe,'
        
  ];
  foreach($classes as $class)
    Artisan::call('make:controllers',[
    'name'=>'$class{controllers}',
    '--api'=>true,
    '--no-interaction'=>true,

]);

 }
 
    public function migrations()
    {
     $tables =[
        'hospital',
        'library',
        'school',
        'cinama',
        'cafe',
     ];
    
     foreach($tables as $table){
       Artisan::call('make:migration' ,[
        'name' =>'create_$table'
       ]);
       sleep(1);
     } 

 
}

}