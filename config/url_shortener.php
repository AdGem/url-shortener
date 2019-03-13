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
];