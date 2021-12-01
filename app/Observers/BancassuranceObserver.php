<?php

namespace App\Observers;

use App\Models\Bancassurance;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class BancassuranceObserver
{
    /**
     * Handle the Bancassurance "saved" event.
     *
     * @param Bancassurance $bancassurance
     * @return void
     */
    public function saved(Bancassurance $bancassurance)
    {
        // Remove all items with "bancassurances" tag
        Cache::tags('bancassurances')->flush();
    }

    /**
     * Handle the Bancassurance "deleted" event.
     *
     * @param Bancassurance $bancassurance
     * @return void
     */
    public function deleted(Bancassurance $bancassurance)
    {
        // Remove all items with "bancassurances" tag
        Cache::tags('bancassurances')->flush();
    }

    /**
     * Handle the Bancassurance "restored" event.
     *
     * @param Bancassurance $bancassurance
     * @return void
     */
    public function restored(Bancassurance $bancassurance)
    {
        // Remove all items with "bancassurances" tag
        Cache::tags('bancassurances')->flush();
    }

    /**
     * Handle the Bancassurance "force deleted" event.
     *
     * @param Bancassurance $bancassurance
     * @return void
     */
    public function forceDeleted(Bancassurance $bancassurance)
    {
        // Remove all items with "bancassurances" tag
        Cache::tags('bancassurances')->flush();
    }
}
