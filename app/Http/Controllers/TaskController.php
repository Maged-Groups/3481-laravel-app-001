<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public static function index()
    {
        return 'All Tasks';
    }

    public static function create()
    {
        echo '<input />';
    }

    public static function edit($task)
    {
        echo "<input value='$task' />";
    }

    public static function show($task)
    {
        return "Task $task Page";
    }

    public static function store(Request $request)
    {
        return $request->all();
    }

    public static function update(Request $request, $task)
    {
        return $request->all();
    }

    public static function destroy( $task)
    {
        return "I will delete task with ID $task";
    }
}
