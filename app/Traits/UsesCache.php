<?php


namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

trait UsesCache
{
    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return Model|null
     */
    public function resolveRouteBinding($value, $field = null): ?Model
    {
        $data = Cache::remember($this->getTable() . ":$value", 60*60*12, function () use ($value, $field) {
            return self::withoutEvents(function () use ($value, $field) {
                return parent::resolveRouteBinding($value, $field);
            });
        });
        event('eloquent.retrieved: App\\Models\\' . class_basename($this), $data);
        return $data;
    }

    /**
     * @param $value
     * @param null $field
     * @return ?Model
     */
    public function resolveSoftDeletableRouteBinding($value, $field = null): ?Model
    {
        $data = Cache::remember($this->getTable() . ":$value", 60*60*12, function () use ($value, $field) {
            return self::withoutEvents(function () use ($value, $field) {
                return parent::resolveSoftDeletableRouteBinding($value, $field);
            });
        });
        event('eloquent.retrieved: App\\Models\\' . class_basename($this), $data);

        return $data;
    }
}