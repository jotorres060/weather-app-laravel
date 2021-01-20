<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Weather\Infrastructure\GetInfoByCityController;

class WeatherController extends Controller
{
    private GetInfoByCityController $getInfoByCityController;

    /**
     * WeatherController constructor.
     * @param GetInfoByCityController $getInfoByCityController
     */
    public function __construct(GetInfoByCityController $getInfoByCityController)
    {
        $this->getInfoByCityController = $getInfoByCityController;
    }

    /**
     * Display the main view
     */
    public function index()
    {
        return view("Weather.index");
    }

    /**
     * Get weather information by city name
     *
     * @param Request $request
     */
    public function getInfoByCity(Request $request)
    {
        $city = $request->input("city");
        $weather = $this->getInfoByCityController->__invoke($request);
        $data = [
            "city"        => $weather->getCity()->value(),
            "region"      => $weather->getRegion()->value(),
            "latitude"    => $weather->getLatitude()->value(),
            "longitude"   => $weather->getLongitude()->value(),
            "temperature" => $weather->getTemperature()->value(),
            "humidity"    => $weather->getHumidity()->value()
        ];

        return view("Weather.index", compact("data", "city"));
    }
}
