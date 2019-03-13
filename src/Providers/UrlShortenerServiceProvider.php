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
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');

        // Publish all configs and migrations
        $this->publish();
    }

    public function register()
    {
        //
    }

    private function publish()
    {
        $publish = [
            __DIR__.'/../../config/url_shortener.php' => config_path('url_shortener.php'),
            __DIR__ . '/../../database/migrations/' => database_path('migrations')
        ];

        $this->publishes($publish);
    }
}