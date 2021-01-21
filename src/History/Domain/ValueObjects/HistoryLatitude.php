<?php

declare(strict_types=1);

namespace Src\History\Domain\ValueObjects;


class HistoryLatitude
{
    private float $value;

    /**
     * HistoryLatitude constructor.
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }
}
