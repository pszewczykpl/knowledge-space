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
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function saved(Event $event)
    {
        Cache::tags('events')->flush();
    }

    /**
     * Handle the Event "deleted" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function deleted(Event $event)
    {
        Cache::tags('events')->flush();
    }

    /**
     * Handle the Event "restored" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function restored(Event $event)
    {
        Cache::tags('events')->flush();
    }

    /**
     * Handle the Event "force deleted" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function forceDeleted(Event $event)
    {
        Cache::tags('events')->flush();
    }
}
