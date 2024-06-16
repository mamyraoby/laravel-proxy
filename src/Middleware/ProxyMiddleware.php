<?php

namespace MamyRaoby\LaravelProxy\Middleware;

use Illuminate\Support\Facades\Config;
use Illuminate\Http\Middleware\TrustProxies;

class ProxyMiddleware extends TrustProxies {
                         
    public function __construct()
    {
        $proxies = Config::get('proxy.trusted_ips', ['*']);

        $this->proxies = count($proxies) === 1
            ? '*'
            : $proxies;
    }
}