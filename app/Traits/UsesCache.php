<?php


namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Trait UsesCache
 *
 * @parent Model
 * @package App\Traits
 */
trait UsesCache
{
    /**
     * Return cache tag to storing data associated with Model
     *
     * @return string
     */
    public function cacheTag(): string
    {
        return $this->getTable();
    }

    public function cacheKey(): string
    {
        return $this->getTable() . ':' . $this->{$this->getKeyName()};
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return Model|null
     */
    public function resolveRouteBinding($value, $field = null): ?Model
    {
        return Cache::remember($this->getTable() . ":$value", now()->addDays(7), function () use ($value, $field) {
            return parent::resolveRouteBinding($value, $field);
        });
    }

    /**
     * @param $value
     * @param null $field
     * @return ?Model
     */
    public function resolveSoftDeletableRouteBinding($value, $field = null): ?Model
    {
        return Cache::remember($this->getTable() . ":$value", now()->addDays(7), function () use ($value, $field) {
            return parent::resolveSoftDeletableRouteBinding($value, $field);
        });
    }
}