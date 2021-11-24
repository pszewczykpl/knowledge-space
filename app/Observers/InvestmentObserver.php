<?php

namespace App\Observers;

use App\Models\Investment;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class InvestmentObserver
{
    /**
     * Handle the Investment "saved" event.
     *
     * @param  \App\Models\Investment  $investment
     * @return void
     */
    public function saved(Investment $investment)
    {
        Cache::tags('investments')->flush();
    }

    /**
     * Handle the Investment "deleted" event.
     *
     * @param  \App\Models\Investment  $investment
     * @return void
     */
    public function deleted(Investment $investment)
    {
        Cache::tags('investments')->flush();
    }

    /**
     * Handle the Investment "restored" event.
     *
     * @param  \App\Models\Investment  $investment
     * @return void
     */
    public function restored(Investment $investment)
    {
        Cache::tags('investments')->flush();
    }

    /**
     * Handle the Investment "force deleted" event.
     *
     * @param  \App\Models\Investment  $investment
     * @return void
     */
    public function forceDeleted(Investment $investment)
    {
        Cache::tags('investments')->flush();
    }
}
