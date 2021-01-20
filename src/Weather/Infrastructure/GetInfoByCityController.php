<?php

declare(strict_types=1);

namespace Src\Weather\Infrastructure;

use Illuminate\Http\Request;
use Src\Weather\Application\GetInfoByCityUseCase;
use Src\Weather\Infrastructure\Repositories\WeatherYahooRepository;

class GetInfoByCityController
{
    private WeatherYahooRepository $repository;

    /**
     * GetInfoByCityController constructor.
     *
     * @param WeatherYahooRepository $repository
     */
    public function __construct(WeatherYahooRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $city = $request->input('city');
        $getInfoByCityUseCase = new GetInfoByCityUseCase($this->repository);
        return $getInfoByCityUseCase->__invoke($city);
    }
}
