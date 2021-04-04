<?php

namespace App\Listeners;

use App\Events\SystemUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class SystemClearCache
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
     * @param  SystemUpdated  $event
     * @return void
     */
    public function handle(SystemUpdated $event)
    {
        Cache::forget('systems_' . $event->system->id);
    }
}
