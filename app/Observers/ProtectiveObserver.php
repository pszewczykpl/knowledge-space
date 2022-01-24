<?php

namespace App\Observers;

use App\Models\Protective;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProtectiveObserver
{
    /**
     * Handle the Protective "retrieved" event.
     *
     * @param Protective $protective
     * @return void
     */
    public function retrieved(Protective $protective)
    {
        Cache::add($protective->cacheKey(), $protective);
    }

    /**
     * Handle the Protective "created" event.
     *
     * @param Protective $protective
     * @return void
     */
    public function created(Protective $protective)
    {
        Cache::put($protective->cacheKey(), $protective);
        Cache::tags($protective->cacheTag())->flush();
    }

    /**
     * Handle the Protective "updated" event.
     *
     * @param Protective $protective
     * @return void
     */
    public function updated(Protective $protective)
    {
        Cache::put($protective->cacheKey(), $protective);
        Cache::tags($protective->cacheTag())->flush();
    }

    /**
     * Handle the Protective "deleted" event.
     *
     * @param Protective $protective
     * @return void
     */
    public function deleted(Protective $protective)
    {
        Cache::forget($protective->cacheKey());
        Cache::tags($protective->cacheTag())->flush();
    }
}
