<?php

namespace App\Observers;

use App\Models\Fund;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class FundObserver
{
    /**
     * Handle the Fund "retrieved" event.
     *
     * @param Fund $fund
     * @return void
     */
    public function retrieved(Fund $fund)
    {
        Cache::add($fund->cacheKey(), $fund);
    }

    /**
     * Handle the Fund "created" event.
     *
     * @param Fund $fund
     * @return void
     */
    public function created(Fund $fund)
    {
        Cache::put($fund->cacheKey(), $fund);
        Cache::tags($fund->cacheTag())->flush();
    }

    /**
     * Handle the Fund "updated" event.
     *
     * @param Fund $fund
     * @return void
     */
    public function updated(Fund $fund)
    {
        Cache::put($fund->cacheKey(), $fund);
        Cache::tags($fund->cacheTag())->flush();
    }

    /**
     * Handle the Fund "deleted" event.
     *
     * @param Fund $fund
     * @return void
     */
    public function deleted(Fund $fund)
    {
        Cache::forget($fund->cacheKey());
        Cache::tags($fund->cacheTag())->flush();
    }
}
