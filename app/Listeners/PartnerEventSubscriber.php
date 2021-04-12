<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PartnerEventSubscriber
{
    /**
     * Handle Partner deleted events.
     * @param $event
     */
    public function handlePartnerCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->partner);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Partner deleted events.
     * @param $event
     */
    public function handlePartnerUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->partner);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Partner saved events.
     * @param $event
     */
    public function handlePartnerSaved($event) {
        Cache::tags('partner')->flush();
        Cache::tags('partners')->flush();
        Cache::tags('events')->flush();
    }

    /**
     * Handle Partner deleted events.
     * @param $event
     */
    public function handlePartnerDeleted($event) {
        Cache::tags('partner')->flush();
        Cache::tags('partners')->flush();
        Cache::tags('events')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->partner);
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
            'App\Events\PartnerCreated',
            [PartnerEventSubscriber::class, 'handlePartnerCreated']
        );

        $events->listen(
            'App\Events\PartnerUpdated',
            [PartnerEventSubscriber::class, 'handlePartnerUpdated']
        );

        $events->listen(
            'App\Events\PartnerSaved',
            [PartnerEventSubscriber::class, 'handlePartnerSaved']
        );

        $events->listen(
            'App\Events\PartnerDeleted',
            [PartnerEventSubscriber::class, 'handlePartnerDeleted']
        );
    }
}