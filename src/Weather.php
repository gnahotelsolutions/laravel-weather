<?php

namespace GNAHotelSolutions\Weather;

use GuzzleHttp\Client;
use Psr\Http\Message\StreamInterface;

class Weather
{
    protected $url = 'api.openweathermap.org/data/2.5/weather';

    protected $units;

    protected $language;

    protected $client;

    public function get(string $city): StreamInterface
    {
        return $this->query(['q' => $city]);
    }

    public function find($id): StreamInterface
    {
        return $this->query(['id' => $id]);
    }

    public function query(array $search): StreamInterface
    {
        return $this->client()->get("{$this->url}?{$this->queryParameters($search)}")->getBody();
    }

    protected function queryParameters(array $search): string
    {
        return http_build_query(array_merge($this->getOptions(), $search));
    }

    public function getOptions(): array
    {
        return [
            'APPID' => config('weather.key'),
            'units' => $this->units ?? config('weather.units'),
            'lang' => $this->language ?? config('weather.language'),
        ];
    }

    public function inUnits(string $units): self
    {
        $this->units = $units;

        return $this;
    }

    public function inLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    protected function client(): Client
    {
        return $this->client ?? new Client();
    }

    public function using(Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
