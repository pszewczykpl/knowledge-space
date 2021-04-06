<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserEventSubscriber
{
    /**
     * Handle User deleted events.
     * @param $event
     */
    public function handleUserCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->user);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle User deleted events.
     * @param $event
     */
    public function handleUserUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->user);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle User saved events.
     * @param $event
     */
    public function handleUserSaved($event) {
        // Delete all users in cache
        Cache::tags('user')->flush();

        // and others with users information
        Cache::tags('users')->flush();
    }

    /**
     * Handle User deleted events.
     * @param $event
     */
    public function handleUserDeleted($event) {
        // Delete all users in cache
        Cache::tags('user')->flush();

        // and others with users information
        Cache::tags('users')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->user);
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
            'App\Events\UserCreated',
            [UserEventSubscriber::class, 'handleUserCreated']
        );

        $events->listen(
            'App\Events\UserUpdated',
            [UserEventSubscriber::class, 'handleUserUpdated']
        );

        $events->listen(
            'App\Events\UserSaved',
            [UserEventSubscriber::class, 'handleUserSaved']
        );

        $events->listen(
            'App\Events\UserDeleted',
            [UserEventSubscriber::class, 'handleUserDeleted']
        );
    }
}