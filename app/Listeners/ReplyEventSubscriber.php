<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ReplyEventSubscriber
{
    /**
     * Handle Reply deleted events.
     * @param $event
     */
    public function handleReplyCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->reply);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Reply deleted events.
     * @param $event
     */
    public function handleReplyUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->reply);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Reply saved events.
     * @param $event
     */
    public function handleReplySaved($event) {
        Cache::tags('reply')->flush();
        Cache::tags('replies')->flush();
        Cache::tags('events')->flush();
    }

    /**
     * Handle Reply deleted events.
     * @param $event
     */
    public function handleReplyDeleted($event) {
        Cache::tags('reply')->flush();
        Cache::tags('replies')->flush();
        Cache::tags('events')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->reply);
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
            'App\Events\ReplyCreated',
            [ReplyEventSubscriber::class, 'handleReplyCreated']
        );

        $events->listen(
            'App\Events\ReplyUpdated',
            [ReplyEventSubscriber::class, 'handleReplyUpdated']
        );

        $events->listen(
            'App\Events\ReplySaved',
            [ReplyEventSubscriber::class, 'handleReplySaved']
        );

        $events->listen(
            'App\Events\ReplyDeleted',
            [ReplyEventSubscriber::class, 'handleReplyDeleted']
        );
    }
}