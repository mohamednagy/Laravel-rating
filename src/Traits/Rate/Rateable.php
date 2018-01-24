<?php

namespace Nagy\LaravelRating\Traits\Rate;

use Nagy\LaravelRating\Models\Rating;

trait Rateable
{
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }

    public function ratingsAvg()
    {
        return $this->ratings()->avg('value');
    }

    public function ratingsCount()
    {
        return $this->ratings()->count();
    }
}