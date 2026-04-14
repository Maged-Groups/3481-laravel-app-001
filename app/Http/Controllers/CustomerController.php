<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "customer request";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storee(Request $request)
    {
        return "customer store";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
   return"CustomerController SHOW :$id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function names(){
        return [
'names'=> [
    '1'=>'marwan',
    '2'=>'mohamed',
    '3'=>'adel',
]

        ];
    }
}
