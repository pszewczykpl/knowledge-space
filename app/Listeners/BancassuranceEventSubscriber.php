<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class BancassuranceEventSubscriber
{
    /**
     * Handle Bancassurance deleted events.
     * @param $event
     */
    public function handleBancassuranceCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->bancassurance);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Bancassurance deleted events.
     * @param $event
     */
    public function handleBancassuranceUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->bancassurance);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Bancassurance saved events.
     * @param $event
     */
    public function handleBancassuranceSaved($event) {
        Cache::tags('bancassurance')->forget('bancassurances_' . $event->bancassurance->id);
        Cache::tags('bancassurances')->flush();
        Cache::tags('events')->flush();
    }

    /**
     * Handle Bancassurance deleted events.
     * @param $event
     */
    public function handleBancassuranceDeleted($event) {
        Cache::tags('bancassurance')->forget('bancassurances_' . $event->bancassurance->id);
        Cache::tags('bancassurances')->flush();
        Cache::tags('events')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->bancassurance);
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
            'App\Events\BancassuranceCreated',
            [BancassuranceEventSubscriber::class, 'handleBancassuranceCreated']
        );

        $events->listen(
            'App\Events\BancassuranceUpdated',
            [BancassuranceEventSubscriber::class, 'handleBancassuranceUpdated']
        );

        $events->listen(
            'App\Events\BancassuranceSaved',
            [BancassuranceEventSubscriber::class, 'handleBancassuranceSaved']
        );

        $events->listen(
            'App\Events\BancassuranceDeleted',
            [BancassuranceEventSubscriber::class, 'handleBancassuranceDeleted']
        );
    }
}