<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class CacheRelation implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return array
     */
    public function get($model, string $key, $value, array $attributes)
    {
        // Check if relation is loaded now, return loaded data if true
        if ($model->relationLoaded($key))
            return $model->getRelationValue($key);

        // Get relation data from database and add to cache
        $data = Cache::tags([$model->getTable(), $model->{$key}()->getRelated()->getTable()])
            ->remember("{$model->getTable()}:$model->id:$key", 60 * 60 * 12, function () use ($model, $key) {
                return $model->getRelationValue($key);
            });

        // Load data into relation
        $model->setRelation($key, $data);

        return $data;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param Model $model
     * @param string $key
     * @param array $value
     * @param array $attributes
     * @return array
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}