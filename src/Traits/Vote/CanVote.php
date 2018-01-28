<?php

namespace Nagy\LaravelRating\Traits\Vote;

use LaravelRating;
use Nagy\LaravelRating\Models\Rating;

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

    public function upVoted()
    {
        $upVoted = $this->votes()->where('value', 1)->get();

        return LaravelRating::resolveRatedItems($upVoted);
    }

    public function downVoted()
    {
        $downVoted = $this->votes()->where('value', 0)->get();

        return LaravelRating::resolveRatedItems($downVoted);
    }

    public function voted()
    {
        return LaravelRating::resolveRatedItems($this->votes);
    }
}