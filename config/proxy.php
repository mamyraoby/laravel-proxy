<?php

use Illuminate\Support\Facades\Config;

return [
    'scheme' => env('PROXY_SCHEME', 'http'),
    'url' => env('PROXY_URL', Config::get('app.url')),
];