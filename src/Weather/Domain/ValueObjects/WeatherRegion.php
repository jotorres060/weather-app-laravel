<?php

declare(strict_types=1);

namespace Src\Weather\Domain\ValueObjects;

class WeatherRegion
{
    private string $value;

    /**
     * WeatherRegion constructor.
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
