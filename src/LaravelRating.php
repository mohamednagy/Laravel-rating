<?php

namespace Nagy\LaravelRating;

use Illuminate\Database\Eloquent\Relations\Relation;

class LaravelRating
{
    const TYPE_LIKE = 'like';
    const TYPE_RATE = 'rate';
    const TYPE_VOTE = 'vote';

    public function rate($user, $rateable, $value, $type)
    {
        if ($this->isRated($user, $rateable, $type)) {
            return $user->{$this->resolveTypeRelation($type)}()
                        ->where('rateable_id', $rateable->id)
                        ->where('type', $type)
                        ->where('rateable_type', $this->getRateableByClass($rateable))
                        ->update(['value' => $value]);
        }

        return $user->{$this->resolveTypeRelation($type)}()->create([
            'rateable_id' => $rateable->id,
            'rateable_type' => $this->getRateableByClass($rateable),
            'value' => $value,
            'type' => $type,
        ]);
    }

    public function unRate($user, $rateable, $type)
    {
        if ($this->isRated($user, $rateable, $type)) {
            return $user->{$this->resolveTypeRelation($type)}()
                        ->where('rateable_id', $rateable->id)
                        ->where('type', $type)
                        ->where('rateable_type', $this->getRateableByClass($rateable))
                        ->delete();
        }

        return false;
    }

    public function isRated($user, $rateable, $type)
    {
        $rating = $user->{$this->resolveTypeRelation($type)}()
                        ->where('rateable_id', $rateable->id)
                        ->where('rateable_type', $this->getRateableByClass($rateable))
                        ->where('type', $type)
                        ->first();

        return $rating != null;
    }

    public function getRatingValue($user, $rateable, $type)
    {
        $rating = $user->{$this->resolveTypeRelation($type)}()
                        ->where('rateable_id', $rateable->id)
                        ->where('rateable_type', $this->getRateableByClass($rateable))
                        ->where('type', $type)
                        ->first();

        return $rating != null ? $rating->value : null;
    }

    private function resolveTypeRelation($type)
    {
        $lookup = [
              static::TYPE_LIKE => 'likes',
              static::TYPE_RATE => 'ratings',
              static::TYPE_VOTE => 'votes',
        ];

        return $lookup[$type];
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
