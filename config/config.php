<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | To use this package you'll need to register into Open Weather Map service
    | and generate an API Key.
    |
    | For more information visit: https://home.openweathermap.org/api_keys
    */

    'key' => env('WEATHER_API_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Units formatting
    |--------------------------------------------------------------------------
    |
    | Standard, metric, and imperial units are available.
    | |-----------|---------------|------------|
    | | Type      |  Temperature  |  Distance  |
    | |-----------|---------------|------------|
    | | standard  |  Kelvin       | meter/sec  |
    | |-----------|---------------|------------|
    | | metric    |  Celsius      | meter/sec  |
    | |-----------|---------------|------------|
    | | imperial  |  Fahrenheit   | miles/hour |
    | |-----------|---------------|------------|
    |
    | For more information visit: https://openweathermap.org/current#other
    */

    'units' => 'metric',

    /*
    |--------------------------------------------------------------------------
    | Language
    |--------------------------------------------------------------------------
    |
    | You can use lang parameter to get the output in your language.
    | Open Weather Map supports the following languages that you can use with
    | the corresponded lang values:
    | Arabic - ar, Bulgarian - bg, Catalan - ca, Czech - cz, German - de,
    | Greek - el, English - en, Persian (Farsi) - fa, Finnish - fi, French - fr,
    | Galician - gl, Croatian - hr, Hungarian - hu, Italian - it, Japanese - ja,
    | Korean - kr, Latvian - la, Lithuanian - lt, Macedonian - mk, Dutch - nl,
    | Polish - pl, Portuguese - pt, Romanian - ro, Russian - ru, Swedish - se,
    | Slovak - sk, Slovenian - sl, Spanish - es, Turkish - tr, Ukrainian - ua,
    | Vietnamese - vi, Chinese Simplified - zh_cn, Chinese Traditional - zh_tw.
    |
    | IMPORTANT: Translation is only applied for the "description" field.
    |
    | For more information visit: https://openweathermap.org/current#other
    */

    'language' => 'es',

];
