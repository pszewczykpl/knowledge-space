<?php

namespace App\Listeners;

use App\Events\PartnerUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  PartnerUpdate  $event
     * @return void
     */
    public function handle(PartnerUpdate $event)
    {
        //
    }
}
