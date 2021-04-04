<?php

namespace App\Listeners;

use App\Events\BancassuranceUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class BancassuranceClearCache
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
     * @param  BancassuranceUpdated  $event
     * @return void
     */
    public function handle(BancassuranceUpdated $event)
    {
        Cache::forget('bancassurances_' . $event->bancassurance->id);
    }
}
