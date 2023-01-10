<?php

namespace AdGem\UrlShortener\Algorithms;

/**
 *
 */
class Algorithm
{
    const ShortUUID = 'shortuuid';
    const HASHIDS = 'hashids';

    public function get()
    {
        if (config('url_shortener.algorithm') === self::ShortUUID) {
            return (new ShortUUID);
        }

        if (config('url_shortener.algorithm') === self::HASHIDS) {
            return (new Hashids);
        }

        throw new \Exception("[UrlShortener] There is no valid algorithm!", 1);
    }
}