<?php

namespace Nagy\LaravelRating\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $guarded = [];

    protected $table = 'ratings';

    public function model()
    {
        return $this->morphTo();
    }

    public function rateable()
    {
        return $this->morphTo();
    }
}