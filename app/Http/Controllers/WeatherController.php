<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Display the main view
     */
    public function index()
    {
        return view("Weather.index");
    }
}
