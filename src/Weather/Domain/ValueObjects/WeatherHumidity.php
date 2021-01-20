<?php

declare(strict_types=1);

namespace Src\Weather\Domain\ValueObjects;


class WeatherHumidity
{
    private int $value;

    /**
     * WeatherHumidity constructor.
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
