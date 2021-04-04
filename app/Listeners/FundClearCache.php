<?php

namespace App\Listeners;

use App\Events\FundSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class FundClearCache
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
     * @param  FundSaved  $event
     * @return void
     */
    public function handle(FundSaved $event)
    {
        Cache::forget('funds_' . $event->fund->id);
    }
}
