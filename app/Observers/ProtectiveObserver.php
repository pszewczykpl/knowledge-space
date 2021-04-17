<?php

namespace App\Observers;

use App\Models\Protective;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;

class ProtectiveObserver
{
    /**
     * Handle the Protective "created" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function created(Protective $protective)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($protective);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Protective "updated" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function updated(Protective $protective)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($protective);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Protective "saved" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function saved(Protective $protective)
    {
        Cache::tags('protectives')->flush();
    }

    /**
     * Handle the Protective "deleted" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function deleted(Protective $protective)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($protective);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Protective "restored" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function restored(Protective $protective)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($protective);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Protective "force deleted" event.
     *
     * @param  \App\Models\Protective  $protective
     * @return void
     */
    public function forceDeleted(Protective $protective)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($protective);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }
}
