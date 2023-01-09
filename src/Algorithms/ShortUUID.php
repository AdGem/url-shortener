<?php

namespace AdGem\UrlShortener\Algorithms;

use AdGem\UrlShortener\Url;
use PascalDeVink\ShortUuid\ShortUuid as Alg;

/**
 *
 */
class ShortUUID
{
    public function createRecord($_url)
    {
        return Url::create([
            'original_url' => $_url,
            'code' => Alg::uuid1(),
        ]);
    }

    public function getRecord($code)
    {
        return Url::whereCode($code)->first();
    }
}