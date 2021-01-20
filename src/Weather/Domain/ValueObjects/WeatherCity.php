<?php

declare(strict_types=1);

namespace Src\Weather\Domain\ValueObjects;


class WeatherCity
{
    private string $value;

    /**
     * WeatherCity constructor.
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
