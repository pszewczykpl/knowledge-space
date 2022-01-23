<?php

namespace App\Observers;

use App\Models\Reply;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ReplyObserver
{
    /**
     * Handle the Reply "retrieved" event.
     *
     * @param Reply $reply
     * @return void
     */
    public function retrieved(Reply $reply)
    {
        Cache::add($reply->cacheKey(), $reply);
    }

    /**
     * Handle the Reply "created" event.
     *
     * @param Reply $reply
     * @return void
     */
    public function created(Reply $reply)
    {
        Cache::put($reply->cacheKey(), $reply);
        Cache::tags($reply->cacheTag())->flush();
    }

    /**
     * Handle the Reply "updated" event.
     *
     * @param Reply $reply
     * @return void
     */
    public function updated(Reply $reply)
    {
        Cache::put($reply->cacheKey(), $reply);
        Cache::tags($reply->cacheTag())->flush();
    }

    /**
     * Handle the Reply "deleted" event.
     *
     * @param Reply $reply
     * @return void
     */
    public function deleted(Reply $reply)
    {
        Cache::forget($reply->cacheKey());
        Cache::tags($reply->cacheTag())->flush();
    }

    /**
     * Handle the Reply "restored" event.
     *
     * @param Reply $reply
     * @return void
     */
    public function restored(Reply $reply)
    {
        Cache::put($reply->cacheKey(), $reply);
        Cache::tags($reply->cacheTag())->flush();
    }

    /**
     * Handle the Reply "force deleted" event.
     *
     * @param Reply $reply
     * @return void
     */
    public function forceDeleted(Reply $reply)
    {
        Cache::forget($reply->cacheKey());
    }
}
