<?php

namespace App\Observers;

use App\Models\Bancassurance;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class BancassuranceObserver
{
    /**
     * Handle the Bancassurance "created" event.
     *
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return void
     */
    public function created(Bancassurance $bancassurance)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($bancassurance);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Bancassurance "updated" event.
     *
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return void
     */
    public function updated(Bancassurance $bancassurance)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($bancassurance);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Bancassurance "saved" event.
     *
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return void
     */
    public function saved(Bancassurance $bancassurance)
    {
        Cache::tags('bancassurances')->flush();
    }

    /**
     * Handle the Bancassurance "deleted" event.
     *
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return void
     */
    public function deleted(Bancassurance $bancassurance)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($bancassurance);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }

        Cache::tags('bancassurances')->flush();
    }

    /**
     * Handle the Bancassurance "restored" event.
     *
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return void
     */
    public function restored(Bancassurance $bancassurance)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($bancassurance);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }

        Cache::tags('bancassurances')->flush();
    }

    /**
     * Handle the Bancassurance "force deleted" event.
     *
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return void
     */
    public function forceDeleted(Bancassurance $bancassurance)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($bancassurance);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }

        Cache::tags('bancassurances')->flush();
    }
}
