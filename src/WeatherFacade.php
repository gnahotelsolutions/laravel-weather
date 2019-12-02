<?php

namespace GNAHotelSolutions\Weather;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GNAHotelSolutions\Weather\Weather
 */
class WeatherFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'weather';
    }
}
