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
     * @param Protective $protective
     * @return void
     */
    public function saved(Protective $protective)
    {
        Cache::forget("protectives:$protective->id");
        // Remove all items with "protectives" tag
        Cache::tags('protectives')->flush();
    }

    /**
     * Handle the Protective "deleted" event.
     *
     * @param Protective $protective
     * @return void
     */
    public function deleted(Protective $protective)
    {
        // Remove all items with "protectives" tag
        Cache::tags('protectives')->flush();
    }

    /**
     * Handle the Protective "restored" event.
     *
     * @param Protective $protective
     * @return void
     */
    public function restored(Protective $protective)
    {
        // Remove all items with "protectives" tag
        Cache::tags('protectives')->flush();
    }

    /**
     * Handle the Protective "force deleted" event.
     *
     * @param Protective $protective
     * @return void
     */
    public function forceDeleted(Protective $protective)
    {
        // Remove all items with "protectives" tag
        Cache::tags('protectives')->flush();
    }
}
