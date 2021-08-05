<?php

namespace App\Observers;

use App\Models\FileCategory;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class FileCategoryObserver
{
    /**
     * Handle the FileCategory "created" event.
     *
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function created(FileCategory $fileCategory)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($fileCategory);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the FileCategory "updated" event.
     *
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function updated(FileCategory $fileCategory)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($fileCategory);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the FileCategory "saved" event.
     *
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function saved(FileCategory $fileCategory)
    {
        Cache::tags('file_categories')->flush();
    }

    /**
     * Handle the FileCategory "deleted" event.
     *
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function deleted(FileCategory $fileCategory)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($fileCategory);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }

        Cache::tags('file_categories')->flush();
    }

    /**
     * Handle the FileCategory "restored" event.
     *
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function restored(FileCategory $fileCategory)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($fileCategory);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }

        Cache::tags('file_categories')->flush();
    }

    /**
     * Handle the FileCategory "force deleted" event.
     *
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function forceDeleted(FileCategory $fileCategory)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($fileCategory);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }

        Cache::tags('file_categories')->flush();
    }
}
