<?php

namespace Nagy\LaravelRating;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nagy\LaravelRating\LaravelRating
 */
class LaravelRatingFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravelRating';
    }
}
