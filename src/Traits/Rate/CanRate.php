<?php

namespace Nagy\LaravelRating\Traits\Rate;

use Nagy\LaravelRating\LaravelRating;
use Nagy\LaravelRating\LaravelRatingFacade;
use Nagy\LaravelRating\Models\Rating;

trait CanRate
{
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'model')->where('type', LaravelRating::TYPE_RATE);
    }

    public function rate($model, $value)
    {
        return LaravelRatingFacade::rate($this, $model, $value, LaravelRating::TYPE_RATE);
    }

    public function getRatingValue($model)
    {
        return LaravelRatingFacade::getRatingValue($this, $model, LaravelRating::TYPE_RATE);
    }

    public function isRated($model)
    {
        return LaravelRatingFacade::isRated($this, $model, LaravelRating::TYPE_RATE);
    }

    public function rated()
    {
        return LaravelRatingFacade::resolveRatedItems($this->ratings);
    }
}
