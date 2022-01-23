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
        /**
         * Put data into cache only if there is no such key
         */
        Cache::add("investments:$investment->id", $investment);
    }

    /**
     * Handle the Investment "created" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function created(Investment $investment)
    {
        /**
         * Put newly created data into cache
         */
        Cache::put("investments:$investment->id", $investment);
    }

    /**
     * Handle the Investment "updated" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function updated(Investment $investment)
    {
        /**
         * Put updated data into cache
         */
        Cache::put("investments:$investment->id", $investment);
    }

    /**
     * Handle the Investment "deleted" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function deleted(Investment $investment)
    {
        /**
         * Forget soft deleted data from cache
         */
        Cache::forget("investments:$investment->id");
    }

    /**
     * Handle the Investment "restored" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function restored(Investment $investment)
    {
        /**
         * Put restored data into cache
         */
        Cache::put("investments:$investment->id", $investment);
    }

    /**
     * Handle the Investment "force deleted" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function forceDeleted(Investment $investment)
    {
        /**
         * Forget force deleted data from cache
         */
        Cache::forget("investments:$investment->id");
    }
}
