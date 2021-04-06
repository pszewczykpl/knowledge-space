<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostCategoryEventSubscriber
{
    /**
     * Handle PostCategory deleted events.
     * @param $event
     */
    public function handlePostCategoryCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->postCategory);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle PostCategory deleted events.
     * @param $event
     */
    public function handlePostCategoryUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->postCategory);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle PostCategory saved events.
     * @param $event
     */
    public function handlePostCategorySaved($event) {
        Cache::tags('post_category')->forget('post_categories_' . $event->postCategory->id);
        Cache::tags('post_categories')->flush();
    }

    /**
     * Handle PostCategory deleted events.
     * @param $event
     */
    public function handlePostCategoryDeleted($event) {
        Cache::tags('post_category')->forget('post_categories_' . $event->postCategory->id);
        Cache::tags('post_categories')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->postCategory);
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
            'App\Events\PostCategoryCreated',
            [PostCategoryEventSubscriber::class, 'handlePostCategoryCreated']
        );

        $events->listen(
            'App\Events\PostCategoryUpdated',
            [PostCategoryEventSubscriber::class, 'handlePostCategoryUpdated']
        );

        $events->listen(
            'App\Events\PostCategorySaved',
            [PostCategoryEventSubscriber::class, 'handlePostCategorySaved']
        );

        $events->listen(
            'App\Events\PostCategoryDeleted',
            [PostCategoryEventSubscriber::class, 'handlePostCategoryDeleted']
        );
    }
}