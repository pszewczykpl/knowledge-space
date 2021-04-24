<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait CacheModels {

    /**
     * Get relations data from cache.
     *
     * @param string $relation
     * @param array $additionalTags
     * @return array|mixed
     */
    public function getCachedRelation(string $relation, array $additionalTags = [])
    {
        if ($this->relationLoaded($relation)) {
            return $this->getRelationValue($relation);
        }

        $tags = array_push($additionalTags, $this->getTable(), $this->{$relation}()->getRelated()->getTable());

        $data = Cache::tags($tags)->rememberForever($this->getTable() . '_' . $this->id . '_' . $relation, function () use ($relation) {
            return $this->getRelationValue($relation);
        });

        $this->setRelation($relation, $data);

        return $data;
    }

}