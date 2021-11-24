<?php

namespace App\Observers;

use App\Models\Protective;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProtectiveObserver
{
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
        Cache::tags('protectives')->flush();
    }

    /**
     * Handle the Protective "restored" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function restored(Protective $protective)
    {
        Cache::tags('protectives')->flush();
    }

    /**
     * Handle the Protective "force deleted" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function forceDeleted(Protective $protective)
    {
        Cache::tags('protectives')->flush();
    }
}
