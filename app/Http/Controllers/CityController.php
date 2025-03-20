<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        return response()->json(City::all());
    }

    public function show($id)
    {
        $city = City::findOrFail($id);
        return response()->json($city, 200);
    }
}
