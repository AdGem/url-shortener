<?php

namespace QEDTeam\UrlShortener;

use PascalDeVink\ShortUuid\ShortUuid;
use QEDTeam\UrlShortener\Url;

/**
 *
 */
class Shortener
{
    public function make($_url)
    {
        $code = $this->getCode($_url, config('url_shortener.always_new'));

        $shortUrl = config('app.url') . '/' . config('url_shortener.default_url_path') . '/' . $code;

        return $shortUrl;
    }

    public function getUrl($code)
    {
        return Url::getByCode($code);
    }

    public function getCode($_url, $new)
    {
        if ($new) {
            return $this->createCode($_url);
        }

        return $this->createCodeIfNotExists($_url);
    }

    private function createCode($_url)
    {
        $url = new Url;

        $url->original_url = $_url;
        $url->code = ShortUuid::uuid1();

        $url->save();

        return $url->code;
    }

    private function createCodeIfNotExists($_url)
    {
        if ($url = Url::whereOriginalUrl($_url)->latest()->first()) {
            return $url->code;
        }

        return $this->createCode($_url);
    }
}