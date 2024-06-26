<?php

namespace AdGem\UrlShortener;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public $table = 'shortener_urls';

    public $fillable = ['original_url', 'code'];

    public static function findByCode($code = '')
    {
        return self::whereCode($code)->first();
    }

    public static function findByUrl($_url)
    {
        return self::whereOriginalUrl(base64_encode($_url))->latest()->first();
    }

    public function setOriginalUrlAttribute($value)
    {
        $this->attributes['original_url'] = base64_encode($value);
    }

    public function getOriginalUrlAttribute($value)
    {
        return base64_decode($value);
    }
}
