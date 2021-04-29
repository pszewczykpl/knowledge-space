<?php

namespace App\Observers;

use App\Models\PostCategory;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostCategoryObserver
{
    /**
     * Handle the PostCategory "created" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function created(PostCategory $postCategory)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($postCategory);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the PostCategory "updated" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function updated(PostCategory $postCategory)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($postCategory);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the PostCategory "saved" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function saved(PostCategory $postCategory)
    {
        Cache::tags('post_categories')->flush();
    }

    /**
     * Handle the PostCategory "deleted" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function deleted(PostCategory $postCategory)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($postCategory);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the PostCategory "restored" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function restored(PostCategory $postCategory)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($postCategory);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the PostCategory "force deleted" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function forceDeleted(PostCategory $postCategory)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($postCategory);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }
}
