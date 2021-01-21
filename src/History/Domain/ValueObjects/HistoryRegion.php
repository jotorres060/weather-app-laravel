<?php

declare(strict_types=1);

namespace Src\History\Domain\ValueObjects;


class HistoryRegion
{
    private string $value;

    /**
     * HistoryRegion constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
