<?php

namespace App\Listeners;

use App\Events\SystemUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SystemClearCache
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
     * @param  SystemUpdate  $event
     * @return void
     */
    public function handle(SystemUpdate $event)
    {
        //
    }
}
