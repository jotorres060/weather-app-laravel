<?php

declare(strict_types=1);

namespace Src\Weather\Domain;


use Src\Weather\Domain\ValueObjects\WeatherCity;
use Src\Weather\Domain\ValueObjects\WeatherHumidity;
use Src\Weather\Domain\ValueObjects\WeatherLatitude;
use Src\Weather\Domain\ValueObjects\WeatherLongitude;
use Src\Weather\Domain\ValueObjects\WeatherRegion;
use Src\Weather\Domain\ValueObjects\WeatherTemperature;

class Weather
{
    private WeatherCity $city;
    private WeatherRegion $region;
    private WeatherLatitude $latitude;
    private WeatherLongitude $longitude;
    private WeatherTemperature $temperature;
    private WeatherHumidity $humidity;

    /**
     * Weather constructor.
     *
     * @param WeatherCity $city
     * @param WeatherRegion $region
     * @param WeatherLatitude $latitude
     * @param WeatherLongitude $longitude
     * @param WeatherTemperature $temperature
     * @param WeatherHumidity $humidity
     */
    public function __construct(
        WeatherCity $city,
        WeatherRegion $region,
        WeatherLatitude $latitude,
        WeatherLongitude $longitude,
        WeatherTemperature $temperature,
        WeatherHumidity $humidity
    )
    {
        $this->city = $city;
        $this->region = $region;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->temperature = $temperature;
        $this->humidity = $humidity;
    }

    /**
     * @return WeatherCity
     */
    public function getCity(): WeatherCity
    {
        return $this->city;
    }

    /**
     * @return WeatherRegion
     */
    public function getRegion(): WeatherRegion
    {
        return $this->region;
    }

    /**
     * @return WeatherLatitude
     */
    public function getLatitude(): WeatherLatitude
    {
        return $this->latitude;
    }

    /**
     * @return WeatherLongitude
     */
    public function getLongitude(): WeatherLongitude
    {
        return $this->longitude;
    }

    /**
     * @return WeatherTemperature
     */
    public function getTemperature(): WeatherTemperature
    {
        return $this->temperature;
    }

    /**
     * @return WeatherHumidity
     */
    public function getHumidity(): WeatherHumidity
    {
        return $this->humidity;
    }
}
