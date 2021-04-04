<?php

namespace App\Listeners;

use App\Events\RiskUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class RiskClearCache
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
     * @param  RiskUpdated  $event
     * @return void
     */
    public function handle(RiskUpdated $event)
    {
        Cache::forget('risks_' . $event->risk->id);
    }
}
