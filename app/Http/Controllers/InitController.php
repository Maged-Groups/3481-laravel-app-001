<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use function Pest\Laravel\artisan;


class InitController extends Controller
{
   private $models =[
        'post_statuses',
        'posts',
        'comments',
        'reblies',
        'reaction_types',
        'reactions',
    
     ];
    public function migrations()
    {
     $tables =[
        'post_statuses',
        'posts',
        'comments',
        'reblies',
        'reaction_types',
        'reactions',
    
     ];
    
     foreach($tables as $table){
       Artisan::call('make:migration' ,[
        'name' =>'create_$table'
       ]);
       sleep(1);
     } 

    }
    public function controllers (){
     $classes =[
        'post_statuses',
        'posts',
        'comments',
        'reblies',
        'reaction_types',
        'reactions',
    
     ];
    
     foreach($classes as $class){
       Artisan::call('make:controller' ,[
        'name' =>'$class{controller}',
        '--api'=> true,
        '--no-interaction'=>true,
       ]);
       
     } 
    }
      public function model(){

    foreach($this->models as $model)
       Artisan::call('make:model' ,[
        'name' =>$model,
        '-a'=>true
       ]);
       sleep(1);
     }
}
