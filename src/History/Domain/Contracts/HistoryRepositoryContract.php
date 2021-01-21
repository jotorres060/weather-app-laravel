<?php

declare(strict_types=1);

namespace Src\History\Domain\Contracts;

use Src\History\Domain\History;

interface HistoryRepositoryContract
{
    public function save(History $history): void;

    public function getHistory(): array;
}
