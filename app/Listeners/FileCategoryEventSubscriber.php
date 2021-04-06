<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class FileCategoryEventSubscriber
{
    /**
     * Handle FileCategory deleted events.
     * @param $event
     */
    public function handleFileCategoryCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->fileCategory);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle FileCategory deleted events.
     * @param $event
     */
    public function handleFileCategoryUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->fileCategory);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle FileCategory saved events.
     * @param $event
     */
    public function handleFileCategorySaved($event) {
        Cache::tags('file_category')->forget('file_categories_' . $event->fileCategory->id);
        Cache::tags('file_categories')->flush();
    }

    /**
     * Handle FileCategory deleted events.
     * @param $event
     */
    public function handleFileCategoryDeleted($event) {
        Cache::tags('file_category')->forget('file_categories_' . $event->fileCategory->id);
        Cache::tags('file_categories')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->fileCategory);
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
            'App\Events\FileCategoryCreated',
            [FileCategoryEventSubscriber::class, 'handleFileCategoryCreated']
        );

        $events->listen(
            'App\Events\FileCategoryUpdated',
            [FileCategoryEventSubscriber::class, 'handleFileCategoryUpdated']
        );

        $events->listen(
            'App\Events\FileCategorySaved',
            [FileCategoryEventSubscriber::class, 'handleFileCategorySaved']
        );

        $events->listen(
            'App\Events\FileCategoryDeleted',
            [FileCategoryEventSubscriber::class, 'handleFileCategoryDeleted']
        );
    }
}