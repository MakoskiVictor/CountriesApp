<?php

namespace App\Http\Controllers;

use App\Models\activities;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreactivitiesRequest;
use App\Http\Requests\UpdateactivitiesRequest;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Para recuperar todos los registros de la tabla activities
        return activities::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreactivitiesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(activities $activities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(activities $activities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateactivitiesRequest $request, activities $activities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(activities $activities)
    {
        //
    }
}
