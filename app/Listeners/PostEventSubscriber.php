<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostEventSubscriber
{
    /**
     * Handle Post deleted events.
     * @param $event
     */
    public function handlePostCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->post);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Post deleted events.
     * @param $event
     */
    public function handlePostUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->post);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Post saved events.
     * @param $event
     */
    public function handlePostSaved($event) {
        Cache::tags('post')->flush();
        Cache::tags('posts')->flush();
        Cache::tags('events')->flush();
    }

    /**
     * Handle Post deleted events.
     * @param $event
     */
    public function handlePostDeleted($event) {
        Cache::tags('post')->flush();
        Cache::tags('posts')->flush();
        Cache::tags('events')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->post);
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
            'App\Events\PostCreated',
            [PostEventSubscriber::class, 'handlePostCreated']
        );

        $events->listen(
            'App\Events\PostUpdated',
            [PostEventSubscriber::class, 'handlePostUpdated']
        );

        $events->listen(
            'App\Events\PostSaved',
            [PostEventSubscriber::class, 'handlePostSaved']
        );

        $events->listen(
            'App\Events\PostDeleted',
            [PostEventSubscriber::class, 'handlePostDeleted']
        );
    }
}