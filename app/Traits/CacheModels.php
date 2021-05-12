<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait CacheModels {

    /**
     * Get relations data from cache.
     *
     * @param string $relation
     * @param array $tags
     * @return mixed
     */
    private function getCachedRelation(string $relation, array $tags = []): mixed
    {
        if ($this->relationLoaded($relation)) {
            return $this->getRelationValue($relation);
        }

        array_push($tags, $this->getTable(), $this->{$relation}()->getRelated()->getTable());
        $data = Cache::tags($tags)->rememberForever($this->getTable() . '_' . $this->id . '_' . $relation, function () use ($relation) {
            return $this->getRelationValue($relation);
        });

        $this->setRelation($relation, $data);

        return $data;
    }

}