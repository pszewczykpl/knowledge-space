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
     * @param Fund $fund
     * @return void
     */
    public function saved(Fund $fund)
    {
        // Remove all items with "funds" tag
        Cache::tags('funds')->flush();
    }

    /**
     * Handle the Fund "deleted" event.
     *
     * @param Fund $fund
     * @return void
     */
    public function deleted(Fund $fund)
    {
        // Remove all items with "funds" tag
        Cache::tags('funds')->flush();
    }

    /**
     * Handle the Fund "restored" event.
     *
     * @param Fund $fund
     * @return void
     */
    public function restored(Fund $fund)
    {
        // Remove all items with "funds" tag
        Cache::tags('funds')->flush();
    }

    /**
     * Handle the Fund "force deleted" event.
     *
     * @param Fund $fund
     * @return void
     */
    public function forceDeleted(Fund $fund)
    {
        // Remove all items with "funds" tag
        Cache::tags('funds')->flush();
    }
}
