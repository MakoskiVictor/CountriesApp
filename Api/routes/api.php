<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\ActivitiesController;


// ACÁ DEFINIMOS LAS RUTAS PARA LA API

Route::apiResource('countries', CountriesController::class);

Route::apiResource('activities', ActivitiesController::class);










/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
