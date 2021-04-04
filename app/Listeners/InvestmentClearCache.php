<?php

namespace App\Listeners;

use App\Events\InvestmentUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class InvestmentClearCache
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
     * @param  InvestmentUpdated  $event
     * @return void
     */
    public function handle(InvestmentUpdated $event)
    {
        Cache::forget('investments_' . $event->investment->id);
    }
}
