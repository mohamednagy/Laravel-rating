<?php

namespace Nagy\LaravelRating\Traits\Like;

use Nagy\LaravelRating\Models\Rating;
use Nagy\LaravelRating\LaravelRatingFacade;

trait CanLike
{
    public function likes()
    {
        return $this->morphMany(Rating::class, 'model');
    }

    public function like($model)
    {
        return LaravelRatingFacade::rate($this, $model, 1);
    }

    public function dislike($model)
    {
        return LaravelRatingFacade::rate($this, $model, 0);
    }

    public function isLiked($model)
    {
        return LaravelRatingFacade::isRated($this, $model);
    }

    public function liked()
    {
        $collection = collect();

        $liked = $this->likes()->where('value', 1)->get();

        return LaravelRatingFacade::resolveRatedItems($liked);
    }

    public function disliked()
    {
        $disliked = $this->likes()->where('value', 0)->get();

        return LaravelRatingFacade::resolveRatedItems($disliked);
    }

    public function likedDisliked()
    {
        return LaravelRatingFacade::resolveRatedItems($this->likes);
    }
}
