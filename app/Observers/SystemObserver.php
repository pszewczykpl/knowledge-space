<?php

namespace App\Observers;

use App\Models\System;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SystemObserver
{
    /**
     * Handle the System "saved" event.
     *
     * @param System $system
     * @return void
     */
    public function saved(System $system)
    {
        Cache::forget("systems:$system->id");
        // Remove all items with "systems" tag
        Cache::tags('systems')->flush();
    }

    /**
     * Handle the System "deleted" event.
     *
     * @param System $system
     * @return void
     */
    public function deleted(System $system)
    {
        // Remove all items with "systems" tag
        Cache::tags('systems')->flush();
    }

    /**
     * Handle the System "restored" event.
     *
     * @param System $system
     * @return void
     */
    public function restored(System $system)
    {
        // Remove all items with "systems" tag
        Cache::tags('systems')->flush();
    }

    /**
     * Handle the System "force deleted" event.
     *
     * @param System $system
     * @return void
     */
    public function forceDeleted(System $system)
    {
        // Remove all items with "systems" tag
        Cache::tags('systems')->flush();
    }
}
