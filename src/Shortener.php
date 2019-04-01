<?php

namespace QEDTeam\UrlShortener;

use QEDTeam\UrlShortener\Algorithms\Algorithm;

/**
 *
 */
class Shortener
{
    private $algorithm;

    public function __construct()
    {
        $this->algorithm = (new Algorithm())->get();
    }

    public function make($_url)
    {
        $code = $this->getCode($_url, config('url_shortener.always_new'));

        $shortUrl = config('url_shortener.app_url') . '/' . config('url_shortener.default_url_path') . '/' . $code;

        return $shortUrl;
    }

    public function getUrl($code)
    {
        return $this->algorithm->getRecord($code)->original_url ?? null;
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
        $url = $this->algorithm->createRecord($_url);

        return $url->code;
    }

    private function createCodeIfNotExists($_url)
    {
        if ($url = Url::findByUrl($_url)) {
            return $url->code;
        }

        return $this->createCode($_url);
    }
}