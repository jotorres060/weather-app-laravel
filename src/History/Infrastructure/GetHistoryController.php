<?php

declare(strict_types=1);

namespace Src\History\Infrastructure;

use Src\History\Application\GetHistoryUseCase;
use Src\History\Infrastructure\Repositories\EloquentHistoryRepository;

class GetHistoryController
{
    private EloquentHistoryRepository $repository;

    /**
     * GetHistoryController constructor.
     * @param EloquentHistoryRepository $repository
     */
    public function __construct(EloquentHistoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): array
    {
        $getHistoryUseCase = new GetHistoryUseCase($this->repository);
        return $getHistoryUseCase->__invoke();
    }
}
