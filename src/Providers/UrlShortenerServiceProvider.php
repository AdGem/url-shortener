<?php

namespace AdGem\UrlShortener\Providers;

use Illuminate\Support\ServiceProvider;

/**
 *
 */
class UrlShortenerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');

        // Publish all configs and migrations
        $this->publish();

        $this->commands([
            \AdGem\UrlShortener\Commands\TruncateShortUrl::class,
        ]);
    }

    public function register()
    {
        //
    }

    private function publish()
    {
        $this->publishes([
            __DIR__.'/../../config/url_shortener.php' => config_path('url_shortener.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations')
        ], 'migrations');
    }
}
