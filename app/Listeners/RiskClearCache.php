<?php

namespace App\Listeners;

use App\Events\RiskUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  RiskUpdate  $event
     * @return void
     */
    public function handle(RiskUpdate $event)
    {
        //
    }
}
