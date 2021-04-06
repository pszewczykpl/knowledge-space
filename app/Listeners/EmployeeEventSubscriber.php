<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class EmployeeEventSubscriber
{
    /**
     * Handle Employee deleted events.
     * @param $event
     */
    public function handleEmployeeCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->employee);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Employee deleted events.
     * @param $event
     */
    public function handleEmployeeUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->employee);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Employee saved events.
     * @param $event
     */
    public function handleEmployeeSaved($event) {
        Cache::tags('employee')->forget('employees_' . $event->employee->id);
        Cache::tags('employees')->flush();
        Cache::tags('events')->flush();
    }

    /**
     * Handle Employee deleted events.
     * @param $event
     */
    public function handleEmployeeDeleted($event) {
        Cache::tags('employee')->forget('employees_' . $event->employee->id);
        Cache::tags('employees')->flush();
        Cache::tags('events')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->employee);
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
            'App\Events\EmployeeCreated',
            [EmployeeEventSubscriber::class, 'handleEmployeeCreated']
        );

        $events->listen(
            'App\Events\EmployeeUpdated',
            [EmployeeEventSubscriber::class, 'handleEmployeeUpdated']
        );

        $events->listen(
            'App\Events\EmployeeSaved',
            [EmployeeEventSubscriber::class, 'handleEmployeeSaved']
        );

        $events->listen(
            'App\Events\EmployeeDeleted',
            [EmployeeEventSubscriber::class, 'handleEmployeeDeleted']
        );
    }
}