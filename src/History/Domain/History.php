<?php

declare(strict_types=1);

namespace Src\History\Domain;

use Src\History\Domain\ValueObjects\HistoryCity;
use Src\History\Domain\ValueObjects\HistoryHumidity;
use Src\History\Domain\ValueObjects\HistoryLatitude;
use Src\History\Domain\ValueObjects\HistoryLongitude;
use Src\History\Domain\ValueObjects\HistoryRegion;
use Src\History\Domain\ValueObjects\HistoryTemperature;

class History
{
    private HistoryCity $city;
    private HistoryRegion $region;
    private HistoryLatitude $latitude;
    private HistoryLongitude $longitude;
    private HistoryTemperature $temperature;
    private HistoryHumidity $humidity;

    /**
     * History constructor.
     * @param HistoryCity $city
     * @param HistoryRegion $region
     * @param HistoryLatitude $latitude
     * @param HistoryLongitude $longitude
     * @param HistoryTemperature $temperature
     * @param HistoryHumidity $humidity
     */
    public function __construct(
        HistoryCity $city,
        HistoryRegion $region,
        HistoryLatitude $latitude,
        HistoryLongitude $longitude,
        HistoryTemperature $temperature,
        HistoryHumidity $humidity
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
     * @return HistoryCity
     */
    public function getCity(): HistoryCity
    {
        return $this->city;
    }

    /**
     * @return HistoryRegion
     */
    public function getRegion(): HistoryRegion
    {
        return $this->region;
    }

    /**
     * @return HistoryLatitude
     */
    public function getLatitude(): HistoryLatitude
    {
        return $this->latitude;
    }

    /**
     * @return HistoryLongitude
     */
    public function getLongitude(): HistoryLongitude
    {
        return $this->longitude;
    }

    /**
     * @return HistoryTemperature
     */
    public function getTemperature(): HistoryTemperature
    {
        return $this->temperature;
    }

    /**
     * @return HistoryHumidity
     */
    public function getHumidity(): HistoryHumidity
    {
        return $this->humidity;
    }

    /**
     * Create a History object
     *
     * @param HistoryCity $city
     * @param HistoryRegion $region
     * @param HistoryLatitude $latitude
     * @param HistoryLongitude $longitude
     * @param HistoryTemperature $temperature
     * @param HistoryHumidity $humidity
     * @return History
     */
    public static function create(
        HistoryCity $city,
        HistoryRegion $region,
        HistoryLatitude $latitude,
        HistoryLongitude $longitude,
        HistoryTemperature $temperature,
        HistoryHumidity $humidity
    ): History
    {
        return new self($city, $region, $latitude, $longitude, $temperature, $humidity);
    }
}
