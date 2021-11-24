<?php

namespace App\Observers;

use App\Models\Reply;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ReplyObserver
{
    /**
     * Handle the Reply "saved" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function saved(Reply $reply)
    {
        Cache::tags('replies')->flush();
    }

    /**
     * Handle the Reply "deleted" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function deleted(Reply $reply)
    {
        Cache::tags('replies')->flush();
    }

    /**
     * Handle the Reply "restored" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function restored(Reply $reply)
    {
        Cache::tags('replies')->flush();
    }

    /**
     * Handle the Reply "force deleted" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function forceDeleted(Reply $reply)
    {
        Cache::tags('replies')->flush();
    }
}
