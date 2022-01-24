<?php

namespace App\Observers;

use App\Models\System;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SystemObserver
{
    /**
     * Handle the System "retrieved" event.
     *
     * @param System $system
     * @return void
     */
    public function retrieved(System $system)
    {
        Cache::add($system->cacheKey(), $system);
    }

    /**
     * Handle the System "created" event.
     *
     * @param System $system
     * @return void
     */
    public function created(System $system)
    {
        Cache::put($system->cacheKey(), $system);
        Cache::tags($system->cacheTag())->flush();
    }

    /**
     * Handle the System "updated" event.
     *
     * @param System $system
     * @return void
     */
    public function updated(System $system)
    {
        Cache::put($system->cacheKey(), $system);
        Cache::tags($system->cacheTag())->flush();
    }

    /**
     * Handle the System "deleted" event.
     *
     * @param System $system
     * @return void
     */
    public function deleted(System $system)
    {
        Cache::forget($system->cacheKey());
        Cache::tags($system->cacheTag())->flush();
    }
}
