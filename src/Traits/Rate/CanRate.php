<?php

namespace Nagy\LaravelRating\Traits\Rate;

use Nagy\LaravelRating\LaravelRatingFacade;
use Nagy\LaravelRating\Models\Rating;

trait CanRate
{
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'model');
    }

    public function rate($model, $value)
    {
        return LaravelRatingFacade::rate($this, $model, $value);
    }

    public function getRatingValue($model)
    {
        return LaravelRatingFacade::getRatingValue($this, $model);
    }

    public function isRated($model)
    {
        return LaravelRatingFacade::isRated($this, $model);
    }

    public function rated()
    {
        return LaravelRatingFacade::resolveRatedItems($this->ratings);
    }
}
