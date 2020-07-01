Laravel log viewer
==================

## TL;DR
No public assets, no vendor routes, works with and/or without log rotate. Modification of [rap2hpoutre/laravel-log-viewer](https://github.com/rap2hpoutre/laravel-log-viewer.)

## What ?
Small log viewer for laravel. Looks like this:

![demo page](https://i.imgur.com/RxZDEC6.png)

## The diffinces from main package
* Log level filters

<p align="left"><img src="https://i.imgur.com/fWrgLVL.png" width="260" height="349"></p>

* Pretty json browsing

![demo page](https://i.imgur.com/R8ENQAs.png)

* Fully lumen support

## Install (Laravel)
Install via composer
```bash
composer require rap2hpoutre/laravel-log-viewer
```

Add Service Provider to `config/app.php` in `providers` section
```php
Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider::class,
```

Add a route in your web routes file:
```php 
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
```

Go to `http://myapp/logs` or some other route

### Install (Lumen)
Install via composer
```bash
composer require rap2hpoutre/laravel-log-viewer
```

Add the following in `bootstrap/app.php`:
```php
$app->register(\Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider::class);
```

Explicitly set the namespace in `app/Http/routes.php`:
```php
$router->group(['namespace' => '\Rap2hpoutre\LaravelLogViewer'], function() use ($router) {
    $router->get('logs', 'LogViewerController@index');
});
```

## Advanced usage
### Customize view
Publish `log.blade.php` into `/resources/views/vendor/laravel-log-viewer/` for view customization:

```bash
php artisan vendor:publish \
  --provider="Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider" \
  --tag=views
``` 

### Edit configuration
Publish `logviewer.php` configuration file into `/config/` for configuration customization:

```bash
php artisan vendor:publish \
  --provider="Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider"
``` 

### Troubleshooting
If you got a `InvalidArgumentException in FileViewFinder.php` error, it may be a problem with config caching. Double check installation, then run `php artisan config:clear`.

