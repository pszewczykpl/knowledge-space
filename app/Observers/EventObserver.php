<?php

namespace App\Observers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class EventObserver
{
    /**
     * Handle the Event "saved" event.
     *
     * @param Event $event
     * @return void
     */
    public function saved(Event $event)
    {
        Cache::forget("events:$event->id");
        // Remove all items with "events" tag
        Cache::tags('events')->flush();
    }

    /**
     * Handle the Event "deleted" event.
     *
     * @param Event $event
     * @return void
     */
    public function deleted(Event $event)
    {
        // Remove all items with "events" tag
        Cache::tags('events')->flush();
    }

    /**
     * Handle the Event "restored" event.
     *
     * @param Event $event
     * @return void
     */
    public function restored(Event $event)
    {
        // Remove all items with "events" tag
        Cache::tags('events')->flush();
    }

    /**
     * Handle the Event "force deleted" event.
     *
     * @param Event $event
     * @return void
     */
    public function forceDeleted(Event $event)
    {
        // Remove all items with "events" tag
        Cache::tags('events')->flush();
    }
}
