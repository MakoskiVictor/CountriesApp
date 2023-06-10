<?php

namespace App\Http\Controllers;

use App\Models\countries;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorecountriesRequest;
use App\Http\Requests\UpdatecountriesRequest;
use Ramsey\Uuid\Uuid;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Para recuperar todos los registros de la tabla countries
        if (countries::count() === 0) {
            // Lamada a api para llenar la database
            $url = "https://restcountries.com/v3.1/all";

            // CONFIGURO LAS OPCIONES DE LECTURA
            $options = array("ssl" => array("verify_peer" => false, "verify_prr_name" => false));

            // FILE_GET_CONTENTE ME PERMITE LEER EL CONTENIDO DE ACUERDO A MIS OPCIONES CONFIGURADAS
            $response = file_get_contents($url, false, stream_context_create($options));

            $objResponse = json_decode($response);


            $filteredCountries = array_map(function($c) {
                return (object) [
                "name" => property_exists($c, 'name') ? $c -> name -> common : $c -> name -> official,
                "capital" => property_exists($c, 'capital') ? $c -> capital[0] : "No info",
                "region" => property_exists($c, 'region') ? $c -> region : "No info",
                "subregion" => property_exists($c, 'subregion') ? $c -> subregion : "No info",
                "languages" => property_exists($c, 'languages') ? reset($c -> languages) : "No info",
                "maps" => property_exists($c, 'maps') ? $c -> maps -> googleMaps : "No info",
                "population" => property_exists($c, 'population') ? $c -> population : 0,
                "flag" => property_exists($c, 'flags') ? $c -> flags -> svg : $c -> flags -> png,
                "area" => property_exists($c, 'area') ? $c -> area : 0
                ];

            
            }, $objResponse);

            // LLENAR LA DATABASE CON NUEVA INFO
            foreach ($filteredCountries as $fc) {
                $uuid = Uuid::uuid4()->toString();
                
                $country = new countries();
                $country->id = $uuid;
                $country->name = $fc->name;
                $country->capital = $fc->capital;
                $country->region = $fc->region;
                $country->subregion = $fc->subregion;
                $country->languages = $fc->languages;
                $country->maps = $fc->maps;
                $country->population = $fc->population;
                $country->flag = $fc->flag;
                $country->area = $fc->area;
                $country->save();
            }
            
            return response()->json(['message' => 'La base de datos se ha llenado correctamente']);


        } else {
            return countries::All();
        }
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
    public function store(StorecountriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(countries $countries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(countries $countries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecountriesRequest $request, countries $countries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(countries $countries)
    {
        //
    }
}
