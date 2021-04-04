<?php

namespace App\Listeners;

use App\Events\RiskSaved;
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
     * @param  RiskSaved  $event
     * @return void
     */
    public function handle(RiskSaved $event)
    {
        Cache::forget('risks_' . $event->risk->id);
        Cache::tags('risks')->flush();
    }
}
