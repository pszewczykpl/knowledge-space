<?php

namespace App\Listeners;

use App\Events\ReplyUpdated;
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
     * @param  ReplyUpdated  $event
     * @return void
     */
    public function handle(ReplyUpdated $event)
    {
        Cache::forget('replies_' . $event->reply->id);
    }
}
