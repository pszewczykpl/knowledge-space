<?php

namespace App\Observers;

use App\Models\System;
use Illuminate\Support\Facades\Cache;

class SystemObserver
{
    /**
     * Handle the System "created" event.
     *
     * @param  \App\Models\System  $system
     * @return void
     */
    public function created(System $system)
    {
        //
    }

    /**
     * Handle the System "updated" event.
     *
     * @param  \App\Models\System  $system
     * @return void
     */
    public function updated(System $system)
    {
        //
    }

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
        //
    }

    /**
     * Handle the System "restored" event.
     *
     * @param  \App\Models\System  $system
     * @return void
     */
    public function restored(System $system)
    {
        //
    }

    /**
     * Handle the System "force deleted" event.
     *
     * @param  \App\Models\System  $system
     * @return void
     */
    public function forceDeleted(System $system)
    {
        //
    }
}
