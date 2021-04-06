<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class RiskEventSubscriber
{
    /**
     * Handle Risk deleted events.
     * @param $event
     */
    public function handleRiskCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->risk);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Risk deleted events.
     * @param $event
     */
    public function handleRiskUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->risk);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Risk saved events.
     * @param $event
     */
    public function handleRiskSaved($event) {
        Cache::tags('risk')->forget('risks_' . $event->risk->id);
        Cache::tags('risks')->flush();
    }

    /**
     * Handle Risk deleted events.
     * @param $event
     */
    public function handleRiskDeleted($event) {
        Cache::tags('risk')->forget('risks_' . $event->risk->id);
        Cache::tags('risks')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->risk);
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
            'App\Events\RiskCreated',
            [RiskEventSubscriber::class, 'handleRiskCreated']
        );

        $events->listen(
            'App\Events\RiskUpdated',
            [RiskEventSubscriber::class, 'handleRiskUpdated']
        );

        $events->listen(
            'App\Events\RiskSaved',
            [RiskEventSubscriber::class, 'handleRiskSaved']
        );

        $events->listen(
            'App\Events\RiskDeleted',
            [RiskEventSubscriber::class, 'handleRiskDeleted']
        );
    }
}