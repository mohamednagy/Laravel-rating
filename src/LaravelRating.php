<?php

namespace Nagy\LaravelRating;

use Illuminate\Database\Eloquent\Relations\Relation;

class LaravelRating
{
    public function rate($user, $rateable, $value)
    {
        if ($this->isRated($user, $rateable)) {
            return $user->ratings()
                        ->where('rateable_id', $rateable->id)
                        ->where('rateable_type', $this->getRateableByClass($rateable))
                        ->update(['value' => $value]);
        }

        return $user->ratings()->create([
            'rateable_id'   => $rateable->id,
            'rateable_type' => $this->getRateableByClass($rateable),
            'value'         => $value
        ]);
    }

    public function isRated($user, $rateable)
    {
        $rating = $user->ratings()
                        ->where('rateable_id', $rateable->id)
                        ->where('rateable_type', $this->getRateableByClass($rateable))
                        ->first();

        return $rating != null;

    }

    public function getRatingValue($user, $rateable)
    {
        $rating = $user->ratings()
                        ->where('rateable_id', $rateable->id)
                        ->where('rateable_type', $this->getRateableByClass($rateable))
                        ->first();

        return $rating != null ? $rating->value : null;
    }

    public function resolveRatedItems($items)
    {
        $collection = collect();
        
        foreach ($items as $item) {
            $rateableClass = $this->getRateableByKey($item->rateable_type);
            $collection->push((new $rateableClass)->find($item->rateable_id));
        }

        return $collection;
    }

    private function getRateableByClass($rateable)
    {
        $rateable = get_class($rateable);
        if (in_array($rateable, Relation::$morphMap)) {
            $rateable = array_search($rateable, Relation::$morphMap);
        }

        return $rateable;
    }

    private function getRateableByKey($rateable)
    {
        if (array_key_exists($rateable, Relation::$morphMap)) {
            $rateable = Relation::$morphMap[$rateable];
        }

        return $rateable;
    }
}
