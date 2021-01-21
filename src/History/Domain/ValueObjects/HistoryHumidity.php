<?php

declare(strict_types=1);

namespace Src\History\Domain\ValueObjects;


class HistoryHumidity
{
    private int $value;

    /**
     * HistoryLatitude constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
