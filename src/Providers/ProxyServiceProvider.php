<?php

namespace MamyRaoby\LaravelProxy\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class ProxyServiceProvider extends ServiceProvider
{
    public function register(): void {
        $this->mergeConfigFrom( __DIR__ . '/../../config/proxy.php', 'proxy');
    }

    public function boot(): void {
        $this->publishes([
            __DIR__ . '/../../config/proxy.php' => App::basePath('config/proxy.php'),
        ], 'mamyraoby-laravel-proxy-config');

        if (Config::get('proxy.scheme') === 'https') {
            URL::forceScheme('https');
        }

        if ($baseUrl = Config::get('proxy.url')) {
            URL::forceRootUrl($baseUrl);
        }
    }
}