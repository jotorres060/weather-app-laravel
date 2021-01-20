<?php

declare(strict_types=1);

namespace Src\Weather\Domain\Contracts;


use Src\Weather\Domain\ValueObjects\WeatherCity;
use Src\Weather\Domain\Weather;

interface WeatherRepositoryContract
{
    public function getInfoByCity(WeatherCity $city): ?Weather;
}
