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
        $migrationsPath = app()->basePath().'/database/migrations/'.date('Y_m_d_His').'_create_ratings_table.php';
        $this->publishes([
            __DIR__.'/../migrations/create_ratings_table.php' => $migrationsPath,
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
