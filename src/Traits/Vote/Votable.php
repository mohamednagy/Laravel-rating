<?php

namespace Nagy\LaravelRating\Traits\Vote;

use Nagy\LaravelRating\Models\Rating;

trait Votable
{
    public function votes()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }

    public function totalVotesCount()
    {
        return $this->votes()->count();
    }

    public function upVotesCount()
    {
        return $this->votes()->where('value', 1)->count();
    }

    public function downVotesCount()
    {
        return $this->votes()->where('value', 0)->count();
    }

    public function votesDiff()
    {
        return $this->upVotesCount() - $this->downVotesCount();
    }
}