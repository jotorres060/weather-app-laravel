<?php

declare(strict_types=1);

namespace Src\Weather\Application;


use Src\Weather\Domain\Contracts\WeatherRepositoryContract;
use Src\Weather\Domain\ValueObjects\WeatherCity;
use Src\Weather\Domain\Weather;

class GetInfoByCityUseCase
{
    private WeatherRepositoryContract $repository;

    /**
     * GetInfoByCityUseCase constructor.
     * @param WeatherRepositoryContract $repository
     */
    public function __construct(WeatherRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $city): ?Weather
    {
        $weatherCity = new WeatherCity($city);
        return $this->repository->getInfoByCity($weatherCity);
    }
}
