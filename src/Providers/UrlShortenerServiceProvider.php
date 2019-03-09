<?php

namespace QEDTeam\UrlShortener\Providers;

use Illuminate\Support\ServiceProvider;

/**
 *
 */
class UrlShortenerSeviceProvider extends ServiceProvider
{
    public function boot()
    {
        if (config('url_shortener.driver', 'local') === 'local') {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }

        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');

        $this->publishes([
            __DIR__.'/../../config/url_shortener.php' => config_path('url_shortener.php'),
        ]);
    }

    public function register()
    {
        //
    }
}