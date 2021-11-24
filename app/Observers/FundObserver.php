<?php

namespace App\Observers;

use App\Models\Fund;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class FundObserver
{
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
        Cache::tags('funds')->flush();
    }

    /**
     * Handle the Fund "restored" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function restored(Fund $fund)
    {
        Cache::tags('funds')->flush();
    }

    /**
     * Handle the Fund "force deleted" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function forceDeleted(Fund $fund)
    {
        Cache::tags('funds')->flush();
    }
}
