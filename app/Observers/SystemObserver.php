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
     * @param  \App\Models\System  $system
     * @return void
     */
    public function saved(System $system)
    {
        Cache::tags('systems')->flush();
    }

    /**
     * Handle the System "deleted" event.
     *
     * @param  \App\Models\System  $system
     * @return void
     */
    public function deleted(System $system)
    {
        Cache::tags('systems')->flush();
    }

    /**
     * Handle the System "restored" event.
     *
     * @param  \App\Models\System  $system
     * @return void
     */
    public function restored(System $system)
    {
        Cache::tags('systems')->flush();
    }

    /**
     * Handle the System "force deleted" event.
     *
     * @param  \App\Models\System  $system
     * @return void
     */
    public function forceDeleted(System $system)
    {
        Cache::tags('systems')->flush();
    }
}
