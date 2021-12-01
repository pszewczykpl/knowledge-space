<?php

namespace App\Observers;

use App\Models\Risk;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class RiskObserver
{
    /**
     * Handle the Risk "saved" event.
     *
     * @param Risk $risk
     * @return void
     */
    public function saved(Risk $risk)
    {
        // Remove all items with "risks" tag
        Cache::tags('risks')->flush();
    }

    /**
     * Handle the Risk "deleted" event.
     *
     * @param Risk $risk
     * @return void
     */
    public function deleted(Risk $risk)
    {
        // Remove all items with "risks" tag
        Cache::tags('risks')->flush();
    }

    /**
     * Handle the Risk "restored" event.
     *
     * @param Risk $risk
     * @return void
     */
    public function restored(Risk $risk)
    {
        // Remove all items with "risks" tag
        Cache::tags('risks')->flush();
    }

    /**
     * Handle the Risk "force deleted" event.
     *
     * @param Risk $risk
     * @return void
     */
    public function forceDeleted(Risk $risk)
    {
        // Remove all items with "risks" tag
        Cache::tags('risks')->flush();
    }
}
