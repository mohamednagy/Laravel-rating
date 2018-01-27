<?php

namespace Nagy\LaravelRating\Traits\Like;

use Nagy\LaravelRating\Models\Rating;

trait Likeable
{
    public function likes()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }

    public function likesDislikesCount()
    {
        return $this->likes()->count();
    }

    public function likesCount()
    {
        return $this->likes()->where('value', 1)->count();
    }

    public function dislikesCount()
    {
        return $this->likes()->where('value', 0)->count();
    }
}