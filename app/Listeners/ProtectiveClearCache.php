<?php

namespace App\Listeners;

use App\Events\ProtectiveUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class ProtectiveClearCache
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProtectiveUpdated  $event
     * @return void
     */
    public function handle(ProtectiveUpdated $event)
    {
        Cache::forget('protectives_' . $event->protective->id);
    }
}
