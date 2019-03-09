<?php

namespace QEDTeam\UrlShortener;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public $table = 'shortener_urls';

    public static function findByCode($code = '')
    {
        return self::whereCode($code)->first();
    }
}
