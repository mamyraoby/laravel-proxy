<?php

use Illuminate\Support\Facades\Config;

return [
    'scheme' => env('PROXY_SCHEME', 'http'),
    'url' => env('PROXY_URL', Config::get('app.url')),
    'trusted_ips' => array_unique(explode(',', env('PROXY_TRUSTED_IPS', '*'))),
];