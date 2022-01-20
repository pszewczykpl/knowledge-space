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
     */
    public function retrieved(Investment $investment)
    {
        StoreEvent::dispatch('retrieved', $investment);
    }


    /**
     * Handle the Investment "saved" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function saved(Investment $investment)
    {
        // Deleting cached eloquent
        Cache::forget("investments:$investment->id");

        // ... and deleting all items with "investments" tag
        Cache::tags('investments')->flush();
    }

    /**
     * Handle the Investment "deleted" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function deleted(Investment $investment)
    {
        // Remove all items with "investments" tag
        Cache::tags('investments')->flush();
    }

    /**
     * Handle the Investment "restored" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function restored(Investment $investment)
    {
        // Remove all items with "investments" tag
        Cache::tags('investments')->flush();
    }

    /**
     * Handle the Investment "force deleted" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function forceDeleted(Investment $investment)
    {
        // Remove all items with "investments" tag
        Cache::tags('investments')->flush();
    }
}
