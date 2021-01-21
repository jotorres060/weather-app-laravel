<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\History\Infrastructure\SaveHistoryController;
use Src\Weather\Infrastructure\GetInfoByCityController;

class WeatherController extends Controller
{
    private GetInfoByCityController $getInfoByCityController;
    private SaveHistoryController $saveHistoryController;

    /**
     * WeatherController constructor.
     * @param GetInfoByCityController $getInfoByCityController
     * @param SaveHistoryController $saveHistoryController
     */
    public function __construct(
        GetInfoByCityController $getInfoByCityController,
        SaveHistoryController $saveHistoryController
    )
    {
        $this->getInfoByCityController = $getInfoByCityController;
        $this->saveHistoryController = $saveHistoryController;
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
            "region"      => trim($weather->getRegion()->value()),
            "latitude"    => $weather->getLatitude()->value(),
            "longitude"   => $weather->getLongitude()->value(),
            "temperature" => $weather->getTemperature()->value(),
            "humidity"    => $weather->getHumidity()->value()
        ];

        $this->saveHistory($data);

        return view("Weather.index", compact("data", "city"));
    }

    private function saveHistory(array $data): void
    {
        $this->saveHistoryController->__invoke($data);
    }
}
