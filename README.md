# Laravel Proxy Package

## What are the use of this package?

- **Automated Configuration:** The package automates the configuration process for Laravel apps deployed behind reverse proxy web servers. This is beneficial because it eliminates the need for repetitive manual configuration each time the app is deployed, saving time and reducing the potential for human error.

- **Asset Handling:** One of the key issues it addresses is the incorrect serving of built and dynamic assets. Reverse proxies can sometimes cause issues with how assets are delivered to the client, and this package ensures that assets are served correctly without additional manual adjustments.

- **Quick Setup:** By using this package, developers can quickly set up their Laravel application for deployment behind a reverse proxy, making the deployment process more efficient.


## Installation

Add `mamyraoby/laravel-proxy` as depenceny of your project, by running the following command:

```bash
composer require mamyraoby/laravel-proxy
```

Then register this middleware into your application:

### Laravel 11 and above
Open the `bootstrap/app.php` and add the following line inside the middlewares registration section:

```php
$middleware->append([
    \MamyRaoby\LaravelProxy\Middleware\ProxyMiddleware::class,
]);
```

### Laravel ancient version
Open the `app/Http/Kernel.php` and update the `middleware` attrubutes value by adding this line:

```php
protected $middleware = [
    \MamyRaoby\LaravelProxy\Middleware\ProxyMiddleware::class,
];
```


You may set up these **env variables** into your `.env` file:

- `PROXY_SCHEME`:
    
    Accepted value: ***http*** or ***https*** . Default to ***http*** if not set.


- `PROXY_URL`:
    
    Accepted value: The **base URL** of the reverse proxy server. Example: *https://example.com*, make sure to include the port if you run from port different form 80 or 443. Default to `APP_URL` env value if not set.

- `PROXY_TRUSTED_IPS`:

    A set of trusted proxies IP address, separated by comma.

    Example: `PROXY_TRUSTED_IPS=172.1.0.0,192.168.1.1`
    
    Default to `*` if not set, which means always trust everything.

    Unset this variable if your server has dynamic IP address or in case you don't know exactly the IP addresses for your server.



You should be good now, but if you need any further configuration or extension, you may publish the configuration file from the vendor, by running the following command:

```bash
php artisan vendor:publish mamyraoby-laravel-proxy-config
```
... and feel free to update your configuration.

## Contribution

If you want to contribute or signal bugs, don't hesitate to open an issue or make a pull request, I also open to discuss, so email me at <a href="mailto:mamyraoby@outlook.com">mamyraoby@outlook.com</a>.