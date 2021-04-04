<?php

namespace App\Listeners;

use App\Events\PartnerUpdated;
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
     * @param  PartnerUpdated  $event
     * @return void
     */
    public function handle(PartnerUpdated $event)
    {
        Cache::forget('partners_' . $event->partner->id);
    }
}
