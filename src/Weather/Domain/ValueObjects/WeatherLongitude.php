<?php

declare(strict_types=1);

namespace Src\Weather\Domain\ValueObjects;

class WeatherLongitude
{
    private float $value;

    /**
     * WeatherLongitude constructor.
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
