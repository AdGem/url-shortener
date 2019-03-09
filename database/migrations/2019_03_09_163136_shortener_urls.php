<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShortenerUrls extends Migration
{
    const MAX = 'text-size';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shortener_urls', function (Blueprint $table) {
            $table->increments('id');
            $urlSize = config('url_shortener.url_size', 255);

            // Url Size can be configured because it depends on app. If we don't
            // need text size we can use varchar
            if ($urlSize <= 65000 and $urlSize !== self::MAX) {
                $table->text('original_url');
            } else {
                $table->string('original_url', $urlSize);
            }

            $table->string('code', 50);
            $table->timestamps();
            $table->index('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shortener_urls');
    }
}
