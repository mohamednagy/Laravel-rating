<?php

namespace Nagy\LaravelRating;

class LaravelRating
{
    public function rate($user, $rateable, $value)
    {
        if ($this->isRated($user, $rateable)) {
            return $user->ratings()
                        ->where('rateable_id', $rateable->id)
                        ->where('rateable_type', get_class($rateable))
                        ->update(['value' => $value]);
        }

        return $user->ratings()->create([
            'rateable_id'   => $rateable->id,
            'rateable_type' => get_class($rateable),
            'value'         => $value
        ]);
    }

    public function isRated($user, $rateable)
    {
        $rating = $user->ratings()
                        ->where('rateable_id', $rateable->id)
                        ->where('rateable_type', get_class($rateable))
                        ->first();

        return $rating != null;

    }

    public function getRatingValue($user, $rateable)
    {
        $rating = $user->ratings()
                        ->where('rateable_id', $rateable->id)
                        ->where('rateable_type', get_class($rateable))
                        ->first();

        return $rating != null ? $rating->value : null;
    }
}