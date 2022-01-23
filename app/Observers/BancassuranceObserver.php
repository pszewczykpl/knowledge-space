<?php

namespace App\Observers;

use App\Models\Bancassurance;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class BancassuranceObserver
{
    /**
     * Handle the Bancassurance "retrieved" event.
     *
     * @param Bancassurance $bancassurance
     * @return void
     */
    public function retrieved(Bancassurance $bancassurance)
    {
        Cache::add($bancassurance->cacheKey(), $bancassurance);
    }

    /**
     * Handle the Bancassurance "created" event.
     *
     * @param Bancassurance $bancassurance
     * @return void
     */
    public function created(Bancassurance $bancassurance)
    {
        Cache::put($bancassurance->cacheKey(), $bancassurance);
        Cache::tags($bancassurance->cacheTag())->flush();
    }

    /**
     * Handle the Bancassurance "updated" event.
     *
     * @param Bancassurance $bancassurance
     * @return void
     */
    public function updated(Bancassurance $bancassurance)
    {
        Cache::put($bancassurance->cacheKey(), $bancassurance);
        Cache::tags($bancassurance->cacheTag())->flush();
    }

    /**
     * Handle the Bancassurance "deleted" event.
     *
     * @param Bancassurance $bancassurance
     * @return void
     */
    public function deleted(Bancassurance $bancassurance)
    {
        Cache::forget($bancassurance->cacheKey());
        Cache::tags($bancassurance->cacheTag())->flush();
    }

    /**
     * Handle the Bancassurance "restored" event.
     *
     * @param Bancassurance $bancassurance
     * @return void
     */
    public function restored(Bancassurance $bancassurance)
    {
        Cache::put($bancassurance->cacheKey(), $bancassurance);
        Cache::tags($bancassurance->cacheTag())->flush();
    }

    /**
     * Handle the Bancassurance "force deleted" event.
     *
     * @param Bancassurance $bancassurance
     * @return void
     */
    public function forceDeleted(Bancassurance $bancassurance)
    {
        Cache::forget($bancassurance->cacheKey());
    }
}
