<?php

declare(strict_types=1);

namespace Src\Weather\Domain\ValueObjects;


class WeatherLatitude
{
    private float $value;

    /**
     * WeatherLatitude constructor.
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
