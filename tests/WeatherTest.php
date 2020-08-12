<?php

namespace GNAHotelSolutions\Weather\Tests;

use GNAHotelSolutions\Weather\Weather;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

class WeatherTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config(['weather.key' => 'test']);

        $this->request = '{"weather":[{"id":300,"main":"Drizzle","description":"light intensity drizzle","icon":"09d"}],"base":"stations","main":{"temp":280.32,"pressure":1012,"humidity":81,"temp_min":279.15,"temp_max":281.15},"visibility":10000,"wind":{"speed":4.1,"deg":80},"clouds":{"all":90},"dt":1485789600,"sys":{"type":1,"id":5091,"message":0.0103,"country":"GB","sunrise":1485762037,"sunset":1485794875},"id":2643743,"name":"London"}';

        $this->weather = new Weather();

        $this->history = collect();

        $this->weather->using($this->getFakeGuzzleClient([$this->request], $this->history));
    }

    /** @test */
    public function can_return_weather_info_by_city()
    {
        $this->assertEquals(json_decode($this->request), json_decode($this->weather->get('London')));
    }

    /** @test */
    public function it_uses_all_parameters()
    {
        $this->weather->get('London');

        $this->assertEquals('APPID=test&units=metric&lang=es&q=London', $this->history->first()['request']->getUri()->getQuery());
    }

    /** @test */
    public function can_change_units()
    {
        $this->weather->inUnits('imperial')->get('London');

        $this->assertEquals('APPID=test&units=imperial&lang=es&q=London', $this->history->first()['request']->getUri()->getQuery());
    }

    /** @test */
    public function can_change_language()
    {
        $this->weather->inLanguage('ca')->get('London');

        $this->assertEquals('APPID=test&units=metric&lang=ca&q=London', $this->history->first()['request']->getUri()->getQuery());
    }

    /** @test */
    public function can_search_by_city_id()
    {
        $this->weather->find('12345');

        $this->assertEquals('APPID=test&units=metric&lang=es&id=12345', $this->history->first()['request']->getUri()->getQuery());
    }

    protected function getFakeGuzzleClient(array $responses, &$container = []): Client
    {
        $handler = HandlerStack::create(
            new MockHandler(
                array_map(function ($response) {
                    return new Response(200, ['Content-Type' => 'application/json'], $response);
                }, $responses)
            )
        );

        $handler->push(Middleware::history($container));

        return new Client(['handler' => $handler]);
    }
}
