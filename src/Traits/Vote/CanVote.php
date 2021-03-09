<?php

namespace Nagy\LaravelRating\Traits\Vote;

use Nagy\LaravelRating\LaravelRating;
use Nagy\LaravelRating\LaravelRatingFacade;
use Nagy\LaravelRating\Models\Rating;

trait CanVote
{
    public function votes()
    {
        return $this->morphMany(Rating::class, 'model')->where('type', LaravelRating::TYPE_VOTE);
    }

    public function upVote($model)
    {
        return LaravelRatingFacade::rate($this, $model, 1, LaravelRating::TYPE_VOTE);
    }

    public function downVote($model)
    {
        return LaravelRatingFacade::rate($this, $model, 0, LaravelRating::TYPE_VOTE);
    }

    public function isVoted($model)
    {
        return LaravelRatingFacade::isRated($this, $model, LaravelRating::TYPE_VOTE);
    }

    public function getVotingValue($model)
    {
        return LaravelRatingFacade::getRatingValue($this, $model, LaravelRating::TYPE_VOTE);
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
