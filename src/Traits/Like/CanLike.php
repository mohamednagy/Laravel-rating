<?php

namespace Nagy\LaravelRating\Traits\Like;

use LaravelRating;
use Nagy\LaravelRating\Models\Rating;

trait CanLike
{
    public function likes()
    {
        return $this->morphMany(Rating::class, 'model');
    }

    public function like($model)
    {
        return LaravelRating::rate($this, $model, 1);
    }

    public function dislike($model)
    {
        return LaravelRating::rate($this, $model, 0);
    }

    public function isLiked($model)
    {
        return LaravelRating::isRated($this, $model);
    }
}