<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProtectiveEventSubscriber
{
    /**
     * Handle Protective deleted events.
     * @param $event
     */
    public function handleProtectiveCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->protective);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Protective deleted events.
     * @param $event
     */
    public function handleProtectiveUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->protective);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Protective saved events.
     * @param $event
     */
    public function handleProtectiveSaved($event) {
        Cache::tags('protective')->forget('protectives_' . $event->protective->id);
        Cache::tags('protectives')->flush();
    }

    /**
     * Handle Protective deleted events.
     * @param $event
     */
    public function handleProtectiveDeleted($event) {
        Cache::tags('protective')->forget('protectives_' . $event->protective->id);
        Cache::tags('protectives')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->protective);
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
            'App\Events\ProtectiveCreated',
            [ProtectiveEventSubscriber::class, 'handleProtectiveCreated']
        );

        $events->listen(
            'App\Events\ProtectiveUpdated',
            [ProtectiveEventSubscriber::class, 'handleProtectiveUpdated']
        );

        $events->listen(
            'App\Events\ProtectiveSaved',
            [ProtectiveEventSubscriber::class, 'handleProtectiveSaved']
        );

        $events->listen(
            'App\Events\ProtectiveDeleted',
            [ProtectiveEventSubscriber::class, 'handleProtectiveDeleted']
        );
    }
}