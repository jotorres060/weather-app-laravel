<?php

declare(strict_types=1);

namespace Src\Weather\Domain\ValueObjects;


class WeatherTemperature
{
    private int $value;

    /**
     * WeatherTemperature constructor.
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
