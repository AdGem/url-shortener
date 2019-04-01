<?php

namespace QEDTeam\UrlShortener\Algorithms;

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

        return null;
    }
}