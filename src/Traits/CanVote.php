<?php

namespace Nagy\LaravelRating\Traits;

use LaravelRating;

trait CanVote
{
    public function votes()
    {
        return $this->morphMany(Rating::class, 'model');
    }

    public function upVote($model)
    {
        return LaravelRating::rate($this, $model, 1);
    }

    public function downVote($model)
    {
        return LaravelRating::rate($this, $model, 0);
    }

    public function isVoted($model)
    {
        return LaravelRating::isRated($this, $model);
    }
}