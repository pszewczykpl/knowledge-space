<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class FileEventSubscriber
{
    /**
     * Handle File deleted events.
     * @param $event
     */
    public function handleFileCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->file);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle File deleted events.
     * @param $event
     */
    public function handleFileUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->file);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle File saved events.
     * @param $event
     */
    public function handleFileSaved($event) {
        Cache::tags('file')->forget('files_' . $event->file->id);
        Cache::tags('files')->flush();
    }

    /**
     * Handle File deleted events.
     * @param $event
     */
    public function handleFileDeleted($event) {
        Cache::tags('file')->forget('files_' . $event->file->id);
        Cache::tags('files')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->file);
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
            'App\Events\FileCreated',
            [FileEventSubscriber::class, 'handleFileCreated']
        );

        $events->listen(
            'App\Events\FileUpdated',
            [FileEventSubscriber::class, 'handleFileUpdated']
        );

        $events->listen(
            'App\Events\FileSaved',
            [FileEventSubscriber::class, 'handleFileSaved']
        );

        $events->listen(
            'App\Events\FileDeleted',
            [FileEventSubscriber::class, 'handleFileDeleted']
        );
    }
}