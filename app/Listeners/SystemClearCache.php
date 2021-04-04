<?php

namespace App\Listeners;

use App\Events\SystemSaved;
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
     * @param  SystemSaved  $event
     * @return void
     */
    public function handle(SystemSaved $event)
    {
        Cache::tags('system')->forget('systems_' . $event->system->id);
        Cache::tags('systems')->flush();
    }
}
