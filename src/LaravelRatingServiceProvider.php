<?php

namespace Nagy\LaravelRating;

use Nagy\LaravelRating\Commands\LaravelRatingCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelRatingServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-rating')
            ->hasConfigFile()
            ->hasMigration('create_laravel_rating_table');
        // ->hasCommand(LaravelRatingCommand::class);
    }

    public function packageRegistered()
    {
        $this->app->bind('laravelRating', function () {
            return new LaravelRating();
        });
    }
}
