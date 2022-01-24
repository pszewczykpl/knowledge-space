<?php

namespace App\Observers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class EventObserver
{
    /**
     * Handle the Event "retrieved" event.
     *
     * @param Event $event
     * @return void
     */
    public function retrieved(Event $event)
    {
        Cache::add($event->cacheKey(), $event);
    }

    /**
     * Handle the Event "created" event.
     *
     * @param Event $event
     * @return void
     */
    public function created(Event $event)
    {
        Cache::put($event->cacheKey(), $event);
        Cache::tags($event->cacheTag())->flush();
    }

    /**
     * Handle the Event "updated" event.
     *
     * @param Event $event
     * @return void
     */
    public function updated(Event $event)
    {
        Cache::put($event->cacheKey(), $event);
        Cache::tags($event->cacheTag())->flush();
    }

    /**
     * Handle the Event "deleted" event.
     *
     * @param Event $event
     * @return void
     */
    public function deleted(Event $event)
    {
        Cache::forget($event->cacheKey());
        Cache::tags($event->cacheTag())->flush();
    }
}
