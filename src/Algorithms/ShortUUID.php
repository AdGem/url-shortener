<?php

namespace QEDTeam\UrlShortener\Algorithms;

use QEDTeam\UrlShortener\Url;
use PascalDeVink\ShortUuid\ShortUuid as Alg;

/**
 *
 */
class ShortUUID
{
    public function createRecord($_url)
    {
        return $url = Url::create([
            'original_url' => $_url,
            'code' => Alg::uuid1(),
        ]);
    }

    public function getRecord($code)
    {
        return Url::whereCode($code)->first();
    }
}