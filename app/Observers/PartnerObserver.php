<?php

namespace App\Observers;

use App\Models\Partner;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PartnerObserver
{
    /**
     * Handle the Partner "retrieved" event.
     *
     * @param Partner $partner
     * @return void
     */
    public function retrieved(Partner $partner)
    {
        Cache::add($partner->cacheKey(), $partner);
    }

    /**
     * Handle the Partner "created" event.
     *
     * @param Partner $partner
     * @return void
     */
    public function created(Partner $partner)
    {
        Cache::put($partner->cacheKey(), $partner);
        Cache::tags($partner->cacheTag())->flush();
    }

    /**
     * Handle the Partner "updated" event.
     *
     * @param Partner $partner
     * @return void
     */
    public function updated(Partner $partner)
    {
        Cache::put($partner->cacheKey(), $partner);
        Cache::tags($partner->cacheTag())->flush();
    }

    /**
     * Handle the Partner "deleted" event.
     *
     * @param Partner $partner
     * @return void
     */
    public function deleted(Partner $partner)
    {
        Cache::forget($partner->cacheKey());
        Cache::tags($partner->cacheTag())->flush();
    }

    /**
     * Handle the Partner "restored" event.
     *
     * @param Partner $partner
     * @return void
     */
    public function restored(Partner $partner)
    {
        Cache::put($partner->cacheKey(), $partner);
        Cache::tags($partner->cacheTag())->flush();
    }

    /**
     * Handle the Partner "force deleted" event.
     *
     * @param Partner $partner
     * @return void
     */
    public function forceDeleted(Partner $partner)
    {
        Cache::forget($partner->cacheKey());
    }
}
