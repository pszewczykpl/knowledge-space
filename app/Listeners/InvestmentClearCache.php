<?php

namespace App\Listeners;

use App\Events\InvestmentUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  InvestmentUpdate  $event
     * @return void
     */
    public function handle(InvestmentUpdate $event)
    {
        //
    }
}
