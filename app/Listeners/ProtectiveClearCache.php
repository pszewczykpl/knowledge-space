<?php

namespace App\Listeners;

use App\Events\ProtectiveSaved;
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
     * @param  ProtectiveSaved  $event
     * @return void
     */
    public function handle(ProtectiveSaved $event)
    {
        Cache::forget('protectives_' . $event->protective->id);
        Cache::tags('protectives')->flush();
    }
}
