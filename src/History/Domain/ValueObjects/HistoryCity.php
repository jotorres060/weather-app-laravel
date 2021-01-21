<?php

declare(strict_types=1);

namespace Src\History\Domain\ValueObjects;

class HistoryCity
{
    private string $value;

    /**
     * HistoryCity constructor.
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
