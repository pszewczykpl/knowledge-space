<?php

namespace App\Observers;

use App\Models\Investment;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;

class InvestmentObserver
{
    /**
     * Handle the Investment "created" event.
     *
     * @param  \App\Models\Investment  $investment
     * @return void
     */
    public function created(Investment $investment)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($investment);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Investment "updated" event.
     *
     * @param  \App\Models\Investment  $investment
     * @return void
     */
    public function updated(Investment $investment)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($investment);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Investment "saved" event.
     *
     * @param  \App\Models\Investment  $investment
     * @return void
     */
    public function saved(Investment $investment)
    {
        Cache::tags('investments')->flush();
    }

    /**
     * Handle the Investment "deleted" event.
     *
     * @param  \App\Models\Investment  $investment
     * @return void
     */
    public function deleted(Investment $investment)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($investment);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Investment "restored" event.
     *
     * @param  \App\Models\Investment  $investment
     * @return void
     */
    public function restored(Investment $investment)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($investment);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Investment "force deleted" event.
     *
     * @param  \App\Models\Investment  $investment
     * @return void
     */
    public function forceDeleted(Investment $investment)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($investment);
        $investment->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }
}
