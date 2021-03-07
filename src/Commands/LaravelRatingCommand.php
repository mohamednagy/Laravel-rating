<?php

namespace Nagy\LaravelRating\Commands;

use Illuminate\Console\Command;

class LaravelRatingCommand extends Command
{
    public $signature = 'laravel-rating';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
