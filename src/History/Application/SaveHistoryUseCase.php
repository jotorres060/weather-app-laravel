<?php

declare(strict_types=1);

namespace Src\History\Application;

use Src\History\Domain\Contracts\HistoryRepositoryContract;
use Src\History\Domain\History;
use Src\History\Domain\ValueObjects\HistoryCity;
use Src\History\Domain\ValueObjects\HistoryHumidity;
use Src\History\Domain\ValueObjects\HistoryLatitude;
use Src\History\Domain\ValueObjects\HistoryLongitude;
use Src\History\Domain\ValueObjects\HistoryRegion;
use Src\History\Domain\ValueObjects\HistoryTemperature;

class SaveHistoryUseCase
{
    private HistoryRepositoryContract $repository;

    /**
     * SaveHistoryUseCase constructor.
     * @param HistoryRepositoryContract $repository
     */
    public function __construct(HistoryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        string $city,
        string $region,
        float $latitude,
        float $longitude,
        int $temperature,
        int $humidity
    ): void
    {
        $history = History::create(
            new HistoryCity($city),
            new HistoryRegion($region),
            new HistoryLatitude($latitude),
            new HistoryLongitude($longitude),
            new HistoryTemperature($temperature),
            new HistoryHumidity($humidity)
        );

        $this->repository->save($history);
    }
}
