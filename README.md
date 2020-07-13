# Laravel Open Weather Map Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gnahotelsolutions/laravel-weather.svg?style=flat-square)](https://packagist.org/packages/gnahotelsolutions/laravel-weather)
[![Build Status](https://img.shields.io/travis/gnahotelsolutions/laravel-weather/master.svg?style=flat-square)](https://travis-ci.org/gnahotelsolutions/laravel-weather)
[![Quality Score](https://img.shields.io/scrutinizer/g/gnahotelsolutions/laravel-weather.svg?style=flat-square)](https://scrutinizer-ci.com/g/gnahotelsolutions/laravel-weather)
[![Total Downloads](https://img.shields.io/packagist/dt/gnahotelsolutions/laravel-weather.svg?style=flat-square)](https://packagist.org/packages/gnahotelsolutions/laravel-weather)

🌤️ A wrapper around Open Weather Map API (Current weather)

## Installation

You can install the package via composer:

```bash
composer require gnahotelsolutions/laravel-weather
```

## Usage

Fill the `WEATHER_API_KEY` environment variable with your own API key to query the server.


```php

use GNAHotelSolutions\Weather\Weather;

$weather = new Weather();

// Checking weather by city name
$currentWeatherInGirona = json_decode($weather->get('girona,es'));

// You can use the city id, this will get you unambiguous results
$currentWeatherInGirona = json_decode($weather->find('3121456'));
```

### Units
By default the package uses `metric` for Celsius temperature results, this can be modified using the 
configuration file or on the fly:

```php
$weather = new Weather();

$currentWeatherInGirona = json_decode($weather->inUnits('imperial')->get('girona,es'));
```

### Language
By default the package uses `es` for the description translation, this can be modified using the
configuration file or on the fly:

```php
$weather = new Weather();

$currentWeatherInGirona = json_decode($weather->inLanguage('en')->get('girona'));
```

### Guzzle Client Instance
If you need to use another instance of Guzzle, to modify headers for example:

```php
$weather = new Weather();

$guzzle = $this->getSpecialGuzzleClient();

$currentWeatherInGirona = json_decode($weather->using($guzzle)->get('girona'));
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email dllop@gnahs.com instead of using the issue tracker.

## Credits

- [David Llop](https://github.com/lloople)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
