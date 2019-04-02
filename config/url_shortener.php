<?php

return [
    /*
     * Dynamic size of the url. You can enter any number allowed by varchar or
     * string max if you want to use text filed in database
     */
    'url_size' => 255,

    /*
     * Default sub-link in the url:
     * www.example.com/{DEFAULT_URL_PATH}/{SHORT_LINK}
     */
    'default_url_path' => 'shlnk',

    /*
     * Redirect if no short link
     */
    'default_error_page' => 'errors.404',

    /*
     * List of middlewares you want to include on shortlink url
     */
    'middleware_name' => ['urls'], // most probably you want web here

    /*
     * Driver can be local or cache
     */
    'driver' => 'local',

    /*
     * Generate new code on each request or check if code already exists for the
     * selected url.
     */
    'always_new' => false,

    /*
     * shortuuid - https://github.com/pascaldevink/shortuuid
     * hashids - https://github.com/ivanakimov/hashids.php
     */
    'algorithm' => 'shortuuid',

    /*
     * It will be used for creating hash from algorithm. You can generate API KEY
     * or use project name. It must be unique and unchangable after first instalation
     */
    'algorithm_hash' => 'My Project',

    /*
     * Minimum number of characters in short link
     */
    'min_min_symbols' => 0,

    /*
     * Domain url of the short link
     */
    'app_url' => env('APP_URL', 'http://localhost'),
];