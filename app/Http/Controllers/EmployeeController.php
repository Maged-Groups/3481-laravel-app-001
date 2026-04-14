<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Employees -> index";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Employees -> store";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Employees -> show";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Employees -> update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Employees -> destroy";
    }

    public function withdraw()
    {
        return "Employees -> withdraw";
    }

    public function candidate()
    {
        return "Employees -> candidate";
    }

    public function new()
    {
        return "Employees -> new";
    }

    public function training()
    {
        return "Employees -> training";
    }

    public function vacations()
    {
        return "Employees -> vacations";
    }

    public function dayOff()
    {
        return "Employees -> dayOff";
    }

    public function permissions(string $type)
    {
        return "Employees -> permissions";
    }
}