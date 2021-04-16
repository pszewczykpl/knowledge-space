<?php

namespace App\Observers;

use App\Models\Protective;
use Illuminate\Support\Facades\Cache;

class ProtectiveObserver
{
    /**
     * Handle the Protective "created" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function created(Protective $protective)
    {
        //
    }

    /**
     * Handle the Protective "updated" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function updated(Protective $protective)
    {
        //
    }

    /**
     * Handle the Protective "saved" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function saved(Protective $protective)
    {
        Cache::tags('protectives')->flush();
    }

    /**
     * Handle the Protective "deleted" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function deleted(Protective $protective)
    {
        //
    }

    /**
     * Handle the Protective "restored" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function restored(Protective $protective)
    {
        //
    }

    /**
     * Handle the Protective "force deleted" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function forceDeleted(Protective $protective)
    {
        //
    }
}
