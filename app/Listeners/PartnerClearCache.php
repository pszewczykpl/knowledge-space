<?php

namespace App\Listeners;

use App\Events\PartnerSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class PartnerClearCache
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
     * @param  PartnerSaved  $event
     * @return void
     */
    public function handle(PartnerSaved $event)
    {
        Cache::forget('partners_' . $event->partner->id);
        Cache::tags('partners')->flush();
    }
}
