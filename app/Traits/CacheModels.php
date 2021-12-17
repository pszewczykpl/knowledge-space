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

    public function getCachedEloquent(string $model, int $id)
    {
        $data = Cache::rememberForever("{$model::getModel()->getTable()}:$id", function () use ($model, $id) {
                return $model::withoutEvents(function () use ($model, $id) {
                    return $model::find($id);
                });
            });

        event("eloquent.retrieved: $model", $data);
        
        return $data;
    }
}
