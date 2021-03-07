<?php

namespace Nagy\LaravelRating;

use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Nagy\LaravelRating\Commands\LaravelRatingCommand;

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
