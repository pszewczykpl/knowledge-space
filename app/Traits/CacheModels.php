<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait CacheModels {

    /**
     * Get relations data from cache.
     *
     * @param string $relation
     * @return mixed
     */
    private function getCachedRelation(string $relation): mixed
    {
        // Check if relation is loaded now, return loaded data if true
        if ($this->relationLoaded($relation))
            return $this->getRelationValue($relation);

        // Get relation data from database and add to cache
        $data = Cache::tags([$this->getTable(), $this->{$relation}()->getRelated()->getTable()])
            ->remember("{$this->getTable()}:$this->id:$relation", 60*60*12,function () use ($relation) {
                return $this->getRelationValue($relation);
            });

        // Load data into relation
        $this->setRelation($relation, $data);

        return $data;
    }
}
