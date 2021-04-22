<?php

namespace Nagy\LaravelRating\Tests;

use Nagy\LaravelRating\LaravelRatingServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelRatingServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);


        include_once __DIR__.'/../database/migrations/create_ratings_table.php.stub';
        include_once __DIR__.'/../database/migrations/add_type_column_to_ratings_table.php.stub';
        include_once __DIR__.'/database/migrations/create_posts_table.php';
        include_once __DIR__.'/database/migrations/create_users_table.php';

        (new \CreateRatingsTable())->up();
        (new \AddTypeColumnToRatingsTable())->up();
        (new \CreatePostsTable())->up();
        (new \CreateUsersTable())->up();
    }
}
