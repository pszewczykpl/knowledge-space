<?php

namespace App\Listeners;

use App\Events\ReplyUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReplyClearCache
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
     * @param  ReplyUpdate  $event
     * @return void
     */
    public function handle(ReplyUpdate $event)
    {
        //
    }
}
