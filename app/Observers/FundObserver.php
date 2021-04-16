<?php

namespace App\Observers;

use App\Models\Fund;
use Illuminate\Support\Facades\Cache;

class FundObserver
{
    /**
     * Handle the Fund "created" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function created(Fund $fund)
    {
        //
    }

    /**
     * Handle the Fund "updated" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function updated(Fund $fund)
    {
        //
    }

    /**
     * Handle the Fund "saved" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function saved(Fund $fund)
    {
        Cache::tags('funds')->flush();
    }

    /**
     * Handle the Fund "deleted" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function deleted(Fund $fund)
    {
        //
    }

    /**
     * Handle the Fund "restored" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function restored(Fund $fund)
    {
        //
    }

    /**
     * Handle the Fund "force deleted" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function forceDeleted(Fund $fund)
    {
        //
    }
}
