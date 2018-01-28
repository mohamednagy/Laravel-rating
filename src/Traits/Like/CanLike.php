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

    public function liked()
    {
        $collection = collect();

        $liked = $this->likes()->where('value', 1)->get();
        
        return LaravelRating::resolveRatedItems($liked);
    }

    public function disliked()
    {        
        $disliked = $this->likes()->where('value', 0)->get();
        
        return LaravelRating::resolveRatedItems($disliked);
    }

    public function likedDisliked()
    {
        return LaravelRating::resolveRatedItems($this->likes);
    }
}