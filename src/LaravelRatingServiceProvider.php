<?php

namespace Nagy\LaravelRating;

use Illuminate\Support\ServiceProvider;

class LaravelRatingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../migrations/create_ratings_table.php' => app()->basePath().'/database/migrations/'.date('Y_m_d_His').'_create_ratings_table.php',
            
        ], 'laravelRatings');
    }

    /**
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('laravelRating', function () {
            return new LaravelRating();
        });
    }
}
