<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class TaskController extends Controller
{
    public static function index(){
     return ('all thinks');
    }
    public static function show ($id){
        Return ('task $id page');
    }
}
