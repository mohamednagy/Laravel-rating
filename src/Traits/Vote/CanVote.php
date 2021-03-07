<?php

namespace Nagy\LaravelRating\Traits\Vote;

use Nagy\LaravelRating\Models\Rating;
use Nagy\LaravelRating\LaravelRatingFacade;

trait CanVote
{
    public function votes()
    {
        return $this->morphMany(Rating::class, 'model');
    }

    public function upVote($model)
    {
        return LaravelRatingFacade::rate($this, $model, 1);
    }

    public function downVote($model)
    {
        return LaravelRatingFacade::rate($this, $model, 0);
    }

    public function isVoted($model)
    {
        return LaravelRatingFacade::isRated($this, $model);
    }

    public function upVoted()
    {
        $upVoted = $this->votes()->where('value', 1)->get();

        return LaravelRatingFacade::resolveRatedItems($upVoted);
    }

    public function downVoted()
    {
        $downVoted = $this->votes()->where('value', 0)->get();

        return LaravelRatingFacade::resolveRatedItems($downVoted);
    }

    public function voted()
    {
        return LaravelRatingFacade::resolveRatedItems($this->votes);
    }
}
