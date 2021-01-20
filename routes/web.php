<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\WeatherController::class, 'index'])
    ->name('weather_index');

Route::post('/get-weather-info-by-city', [\App\Http\Controllers\WeatherController::class, 'getInfoByCity'])
    ->name('weather_get_info_by_city');

Route::get('/history', [\App\Http\Controllers\HistoryController::class, 'index'])
    ->name('history_index');
