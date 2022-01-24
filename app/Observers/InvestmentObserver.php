<?php

namespace App\Observers;

use App\Jobs\StoreEvent;
use App\Models\Investment;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class InvestmentObserver
{
    /**
     * Handle the Investment "retrieved" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function retrieved(Investment $investment)
    {
        Cache::add($investment->cacheKey(), $investment);
    }

    /**
     * Handle the Investment "created" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function created(Investment $investment)
    {
        Cache::put($investment->cacheKey(), $investment);
        Cache::tags($investment->cacheTag())->flush();
    }

    /**
     * Handle the Investment "updated" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function updated(Investment $investment)
    {
        Cache::put($investment->cacheKey(), $investment);
        Cache::tags($investment->cacheTag())->flush();
    }

    /**
     * Handle the Investment "deleted" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function deleted(Investment $investment)
    {
        Cache::forget($investment->cacheKey());
        Cache::tags($investment->cacheTag())->flush();
    }
}
