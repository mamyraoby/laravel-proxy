<?php

namespace MamyRaoby\LaravelProxy\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Middleware\TrustProxies;

class ProxyMiddleware extends TrustProxies {
    /**
     * The trusted proxies headers for the application.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_FOR |
                         Request::HEADER_X_FORWARDED_HOST |
                         Request::HEADER_X_FORWARDED_PORT |
                         Request::HEADER_X_FORWARDED_PROTO |
                         Request::HEADER_X_FORWARDED_AWS_ELB;
                         
    public function __construct()
    {
        $this->proxies = Config::get('proxy.trusted_ips', ['*']);
    }
}