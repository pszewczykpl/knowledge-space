<?php

namespace App\Listeners;

use App\Events\ProtectiveUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProtectiveClearCache
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
     * @param  ProtectiveUpdate  $event
     * @return void
     */
    public function handle(ProtectiveUpdate $event)
    {
        //
    }
}
