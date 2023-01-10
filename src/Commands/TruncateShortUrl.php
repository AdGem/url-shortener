<?php

namespace AdGem\UrlShortener\Commands;

use Illuminate\Console\Command;
use AdGem\UrlShortener\Url;

class TruncateShortUrl extends Command
{
    protected $signature = 'shortener:clear';

    protected $description = 'Truncate short url databatable - like session:clear';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if ($this->confirm('Do you wish to continue this operation?')) {
            $this->info('Cleaning process .....');
            Url::truncate();
            $this->info('Done');
        }
    }
}