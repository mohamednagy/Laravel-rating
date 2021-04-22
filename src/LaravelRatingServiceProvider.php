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
            __DIR__.'/../database/migrations/create_ratings_table.php.stub' => app()->basePath().'/database/migrations/'.date('Y_m_d_His', time() + 1).'_create_ratings_table.php',

            __DIR__.'/../database/migrations/add_type_column_to_ratings_table.php.stub' => app()->basePath().'/database/migrations/'.date('Y_m_d_His', time() + 2).'_add_type_column_to_ratings_table.php',
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
