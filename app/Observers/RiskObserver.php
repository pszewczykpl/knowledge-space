<?php

namespace App\Observers;

use App\Models\Risk;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class RiskObserver
{
    /**
     * Handle the Risk "created" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function created(Risk $risk)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($risk);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the Risk "updated" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function updated(Risk $risk)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($risk);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the Risk "saved" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function saved(Risk $risk)
    {
        Cache::tags('risks')->flush();
    }

    /**
     * Handle the Risk "deleted" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function deleted(Risk $risk)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($risk);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the Risk "restored" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function restored(Risk $risk)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($risk);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the Risk "force deleted" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function forceDeleted(Risk $risk)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($risk);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }
}
