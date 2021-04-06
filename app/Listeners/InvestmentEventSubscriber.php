<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class InvestmentEventSubscriber
{
    /**
     * Handle Investment deleted events.
     * @param $event
     */
    public function handleInvestmentCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->investment);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Investment deleted events.
     * @param $event
     */
    public function handleInvestmentUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->investment);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Investment saved events.
     * @param $event
     */
    public function handleInvestmentSaved($event) {
        Cache::tags('investment')->forget('investments_' . $event->investment->id);
        Cache::tags('investments')->flush();
    }

    /**
     * Handle Investment deleted events.
     * @param $event
     */
    public function handleInvestmentDeleted($event) {
        Cache::tags('investment')->forget('investments_' . $event->investment->id);
        Cache::tags('investments')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->investment);
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
            'App\Events\InvestmentCreated',
            [InvestmentEventSubscriber::class, 'handleInvestmentCreated']
        );

        $events->listen(
            'App\Events\InvestmentUpdated',
            [InvestmentEventSubscriber::class, 'handleInvestmentUpdated']
        );

        $events->listen(
            'App\Events\InvestmentSaved',
            [InvestmentEventSubscriber::class, 'handleInvestmentSaved']
        );

        $events->listen(
            'App\Events\InvestmentDeleted',
            [InvestmentEventSubscriber::class, 'handleInvestmentDeleted']
        );
    }
}