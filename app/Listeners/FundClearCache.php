<?php

namespace App\Listeners;

use App\Events\FundUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  FundUpdate  $event
     * @return void
     */
    public function handle(FundUpdate $event)
    {
        //
    }
}
