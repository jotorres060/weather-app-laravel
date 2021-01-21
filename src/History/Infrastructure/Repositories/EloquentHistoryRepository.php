<?php

declare(strict_types=1);

namespace Src\History\Infrastructure\Repositories;

use App\Models\History as EloquentHistoryModel;
use Src\History\Domain\Contracts\HistoryRepositoryContract;
use Src\History\Domain\History;
use Src\History\Domain\ValueObjects\HistoryCity;
use Src\History\Domain\ValueObjects\HistoryHumidity;
use Src\History\Domain\ValueObjects\HistoryLatitude;
use Src\History\Domain\ValueObjects\HistoryLongitude;
use Src\History\Domain\ValueObjects\HistoryRegion;
use Src\History\Domain\ValueObjects\HistoryTemperature;

class EloquentHistoryRepository implements HistoryRepositoryContract
{
    private EloquentHistoryModel $eloquentHistoryModel;

    /**
     * EloquentHistoryRepository constructor.
     */
    public function __construct()
    {
        $this->eloquentHistoryModel = new EloquentHistoryModel();
    }

    public function save(History $history): void
    {
        $newHistory = $this->eloquentHistoryModel;
        $data = [
            'city'        => $history->getCity()->value(),
            'region'      => $history->getRegion()->value(),
            'latitude'    => $history->getLatitude()->value(),
            'longitude'   => $history->getLongitude()->value(),
            'temperature' => $history->getTemperature()->value(),
            'humidity'    => $history->getHumidity()->value()
        ];

        $newHistory->create($data);
    }

    public function getHistory(): array
    {
        return $this->eloquentHistoryModel->orderByDesc('id')->get()->toArray();
    }
}
