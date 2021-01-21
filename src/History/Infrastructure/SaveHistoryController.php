<?php

declare(strict_types=1);

namespace Src\History\Infrastructure;

use Src\History\Application\SaveHistoryUseCase;
use Src\History\Infrastructure\Repositories\EloquentHistoryRepository;

class SaveHistoryController
{
    private EloquentHistoryRepository $repository;

    /**
     * SaveHistoryController constructor.
     * @param EloquentHistoryRepository $repository
     */
    public function __construct(EloquentHistoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(array $data): void
    {
        $city        = $data['city'];
        $region      = $data['region'];
        $latitude    = $data['latitude'];
        $longitude   = $data['longitude'];
        $temperature = $data['temperature'];
        $humidity    = $data['humidity'];
        $saveHistoryUseCase = new SaveHistoryUseCase($this->repository);
        $saveHistoryUseCase->__invoke(
            $city,
            $region,
            $latitude,
            $longitude,
            $temperature,
            $humidity
        );
    }
}
