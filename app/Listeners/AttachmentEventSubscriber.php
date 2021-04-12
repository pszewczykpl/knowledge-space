<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AttachmentEventSubscriber
{
    /**
     * Handle Attachment deleted events.
     * @param $event
     */
    public function handleAttachmentCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->attachment);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Attachment deleted events.
     * @param $event
     */
    public function handleAttachmentUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->attachment);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle Attachment saved events.
     * @param $event
     */
    public function handleAttachmentSaved($event) {
        Cache::tags('attachment')->flush();
        Cache::tags('attachments')->flush();
        Cache::tags('events')->flush();
    }

    /**
     * Handle Attachment deleted events.
     * @param $event
     */
    public function handleAttachmentDeleted($event) {
        Cache::tags('attachment')->flush();
        Cache::tags('attachments')->flush();
        Cache::tags('events')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->attachment);
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
            'App\Events\AttachmentCreated',
            [AttachmentEventSubscriber::class, 'handleAttachmentCreated']
        );

        $events->listen(
            'App\Events\AttachmentUpdated',
            [AttachmentEventSubscriber::class, 'handleAttachmentUpdated']
        );

        $events->listen(
            'App\Events\AttachmentSaved',
            [AttachmentEventSubscriber::class, 'handleAttachmentSaved']
        );

        $events->listen(
            'App\Events\AttachmentDeleted',
            [AttachmentEventSubscriber::class, 'handleAttachmentDeleted']
        );
    }
}