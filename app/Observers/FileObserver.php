<?php

namespace App\Observers;

use App\Models\File;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class FileObserver
{
    /**
     * Handle the File "created" event.
     *
     * @param  \App\Models\File  $file
     * @return void
     */
    public function created(File $file)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($file);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the File "updated" event.
     *
     * @param  \App\Models\File  $file
     * @return void
     */
    public function updated(File $file)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($file);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the File "saved" event.
     *
     * @param  \App\Models\File  $file
     * @return void
     */
    public function saved(File $file)
    {
        Cache::tags('files')->flush();
    }

    /**
     * Handle the File "deleted" event.
     *
     * @param  \App\Models\File  $file
     * @return void
     */
    public function deleted(File $file)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($file);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the File "restored" event.
     *
     * @param  \App\Models\File  $file
     * @return void
     */
    public function restored(File $file)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($file);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the File "force deleted" event.
     *
     * @param  \App\Models\File  $file
     * @return void
     */
    public function forceDeleted(File $file)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($file);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }
}
