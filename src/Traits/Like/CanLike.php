<?php

namespace Nagy\LaravelRating\Traits\Like;

use Nagy\LaravelRating\LaravelRating;
use Nagy\LaravelRating\LaravelRatingFacade;
use Nagy\LaravelRating\Models\Rating;

trait CanLike
{
    public function likes()
    {
        return $this->morphMany(Rating::class, 'model')->where('type', LaravelRating::TYPE_LIKE);
    }

    public function like($model)
    {
        return LaravelRatingFacade::rate($this, $model, 1, LaravelRating::TYPE_LIKE);
    }

    public function dislike($model)
    {
        return LaravelRatingFacade::rate($this, $model, 0, LaravelRating::TYPE_LIKE);
    }

    public function isLiked($model)
    {
        return LaravelRatingFacade::isRated($this, $model, LaravelRating::TYPE_LIKE);
    }

    public function liked()
    {
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
