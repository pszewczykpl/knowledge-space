<?php

namespace App\Observers;

use App\Models\System;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SystemObserver
{
    /**
     * Handle the System "created" event.
     *
     * @param  \App\Models\System  $system
     * @return void
     */
    public function created(System $system)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($system);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the System "updated" event.
     *
     * @param  \App\Models\System  $system
     * @return void
     */
    public function updated(System $system)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($system);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the System "saved" event.
     *
     * @param  \App\Models\System  $system
     * @return void
     */
    public function saved(System $system)
    {
        Cache::tags('systems')->flush();
    }

    /**
     * Handle the System "deleted" event.
     *
     * @param  \App\Models\System  $system
     * @return void
     */
    public function deleted(System $system)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($system);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);

        Cache::tags('systems')->flush();
    }

    /**
     * Handle the System "restored" event.
     *
     * @param  \App\Models\System  $system
     * @return void
     */
    public function restored(System $system)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($system);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);

        Cache::tags('systems')->flush();
    }

    /**
     * Handle the System "force deleted" event.
     *
     * @param  \App\Models\System  $system
     * @return void
     */
    public function forceDeleted(System $system)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($system);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);

        Cache::tags('systems')->flush();
    }
}
