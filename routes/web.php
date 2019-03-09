<?php

$defaultPath = config('url_shortener.default_url_path');

Route::get("/$defaultPath/{short_id}", '\QEDTeam\UrlShortener\Controllers\UrlController@index')
    ->middleware(config('url_shortener.middleware_name', ['urls']));