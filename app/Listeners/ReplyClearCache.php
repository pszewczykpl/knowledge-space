<?php

namespace App\Listeners;

use App\Events\ReplySaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

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
     * @param  ReplySaved  $event
     * @return void
     */
    public function handle(ReplySaved $event)
    {
        Cache::forget('replies_' . $event->reply->id);
    }
}
