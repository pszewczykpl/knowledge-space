<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SystemEventSubscriber
{
    /**
     * Handle System deleted events.
     * @param $event
     */
    public function handleSystemCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->system);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle System deleted events.
     * @param $event
     */
    public function handleSystemUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->system);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle System saved events.
     * @param $event
     */
    public function handleSystemSaved($event) {
        Cache::tags('system')->flush();
        Cache::tags('systems')->flush();
        Cache::tags('events')->flush();
    }

    /**
     * Handle System deleted events.
     * @param $event
     */
    public function handleSystemDeleted($event) {
        Cache::tags('system')->flush();
        Cache::tags('systems')->flush();
        Cache::tags('events')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->system);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\SystemCreated',
            [SystemEventSubscriber::class, 'handleSystemCreated']
        );

        $events->listen(
            'App\Events\SystemUpdated',
            [SystemEventSubscriber::class, 'handleSystemUpdated']
        );

        $events->listen(
            'App\Events\SystemSaved',
            [SystemEventSubscriber::class, 'handleSystemSaved']
        );

        $events->listen(
            'App\Events\SystemDeleted',
            [SystemEventSubscriber::class, 'handleSystemDeleted']
        );
    }
}