<?php

namespace GNAHotelSolutions\Weather\Tests;

use GNAHotelSolutions\Weather\WeatherServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [WeatherServiceProvider::class];
    }
}
