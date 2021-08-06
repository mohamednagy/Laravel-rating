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
        return round($this->ratings()->where('type', 'rate')->avg('value'), 2);
    }

    public function ratingsCount()
    {
        return $this->ratings()->count();
    }
}
