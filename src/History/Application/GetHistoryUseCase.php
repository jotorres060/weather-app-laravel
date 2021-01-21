<?php

declare(strict_types=1);

namespace Src\History\Application;

use Src\History\Domain\Contracts\HistoryRepositoryContract;

class GetHistoryUseCase
{
    private HistoryRepositoryContract $repository;

    /**
     * GetHistoryUseCase constructor.
     * @param HistoryRepositoryContract $repository
     */
    public function __construct(HistoryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): array
    {
        return $this->repository->getHistory();
    }
}
