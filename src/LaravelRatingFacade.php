<?php

namespace Nagy\LaravelRating;

use Illuminate\Support\Facades\Facade;

class LaravelRatingFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravelRating';
    }
}