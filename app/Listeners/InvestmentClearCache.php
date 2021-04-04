<?php

namespace App\Listeners;

use App\Events\InvestmentSaved;
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
     * @param  InvestmentSaved  $event
     * @return void
     */
    public function handle(InvestmentSaved $event)
    {
        Cache::forget('investments_' . $event->investment->id);
        Cache::tags('investments')->flush();
    }
}
