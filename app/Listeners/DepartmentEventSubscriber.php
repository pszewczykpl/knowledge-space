<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DepartmentEventSubscriber
{
    /**
     * Handle Department deleted events.
     * @param $event
     */
    public function handleDepartmentCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->department);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Department deleted events.
     * @param $event
     */
    public function handleDepartmentUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->department);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Department saved events.
     * @param $event
     */
    public function handleDepartmentSaved($event) {
        Cache::tags('department')->flush();
        Cache::tags('departments')->flush();
        Cache::tags('events')->flush();
    }

    /**
     * Handle Department deleted events.
     * @param $event
     */
    public function handleDepartmentDeleted($event) {
        Cache::tags('department')->flush();
        Cache::tags('departments')->flush();
        Cache::tags('events')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->department);
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
            'App\Events\DepartmentCreated',
            [DepartmentEventSubscriber::class, 'handleDepartmentCreated']
        );

        $events->listen(
            'App\Events\DepartmentUpdated',
            [DepartmentEventSubscriber::class, 'handleDepartmentUpdated']
        );

        $events->listen(
            'App\Events\DepartmentSaved',
            [DepartmentEventSubscriber::class, 'handleDepartmentSaved']
        );

        $events->listen(
            'App\Events\DepartmentDeleted',
            [DepartmentEventSubscriber::class, 'handleDepartmentDeleted']
        );
    }
}