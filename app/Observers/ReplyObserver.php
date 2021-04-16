<?php

namespace App\Observers;

use App\Models\Reply;
use Illuminate\Support\Facades\Cache;

class ReplyObserver
{
    /**
     * Handle the Reply "created" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function created(Reply $reply)
    {
        //
    }

    /**
     * Handle the Reply "updated" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function updated(Reply $reply)
    {
        //
    }

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
        //
    }

    /**
     * Handle the Reply "restored" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function restored(Reply $reply)
    {
        //
    }

    /**
     * Handle the Reply "force deleted" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function forceDeleted(Reply $reply)
    {
        //
    }
}
