<?php

namespace App\Observers;

use App\Models\Fund;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;

class FundObserver
{
    /**
     * Handle the Fund "created" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function created(Fund $fund)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($fund);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Fund "updated" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function updated(Fund $fund)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($fund);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Fund "saved" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function saved(Fund $fund)
    {
        Cache::tags('funds')->flush();
    }

    /**
     * Handle the Fund "deleted" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function deleted(Fund $fund)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($fund);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Fund "restored" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function restored(Fund $fund)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($fund);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Fund "force deleted" event.
     *
     * @param  \App\Models\Fund  $fund
     * @return void
     */
    public function forceDeleted(Fund $fund)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($fund);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }
}
