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
        // Check if relation is loaded now, return loaded data if true
        if ($this->relationLoaded($relation)) {
            return $this->getRelationValue($relation);
        }

        // Add: custom tags from function arg and name of database tables: this and related
        array_push($tags, $this->getTable(), $this->{$relation}()->getRelated()->getTable());

        // Get relation data from database and add to cache
        $data = Cache::tags($tags)
            ->rememberForever($this->getTable() . ':' . $this->id . ':' . $relation, function () use ($relation) {
                return $this->getRelationValue($relation);
            });

        // Load data into relation
        $this->setRelation($relation, $data);

        return $data;
    }
}
