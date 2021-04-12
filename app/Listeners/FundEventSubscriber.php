<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class FundEventSubscriber
{
    /**
     * Handle Fund deleted events.
     * @param $event
     */
    public function handleFundCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->fund);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Fund deleted events.
     * @param $event
     */
    public function handleFundUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->fund);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Fund saved events.
     * @param $event
     */
    public function handleFundSaved($event) {
        Cache::tags('fund')->flush();
        Cache::tags('funds')->flush();
        Cache::tags('events')->flush();
    }

    /**
     * Handle Fund deleted events.
     * @param $event
     */
    public function handleFundDeleted($event) {
        Cache::tags('fund')->flush();
        Cache::tags('funds')->flush();
        Cache::tags('events')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->fund);
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
            'App\Events\FundCreated',
            [FundEventSubscriber::class, 'handleFundCreated']
        );

        $events->listen(
            'App\Events\FundUpdated',
            [FundEventSubscriber::class, 'handleFundUpdated']
        );

        $events->listen(
            'App\Events\FundSaved',
            [FundEventSubscriber::class, 'handleFundSaved']
        );

        $events->listen(
            'App\Events\FundDeleted',
            [FundEventSubscriber::class, 'handleFundDeleted']
        );
    }
}