<?php

namespace App\Http\Controllers;

use App\Models\activities;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreactivitiesRequest;
use App\Http\Requests\UpdateactivitiesRequest;
use Ramsey\Uuid\Uuid;

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
        // CREAR ACTIVIDAD
        dd($request->all()); // Para que me devuleva los valores asignados
        $uuid = Uuid::uuid4()->toString();

        $activity = new activities();

        $activity->id = $uuid;
        $activity->name = $request->name;
        $activity->duration = $request->duration;
        $activity->difficulty = $request->difficulty;
        $activity->season = $request->season;

        $activity-> save();

        return $activity;
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
