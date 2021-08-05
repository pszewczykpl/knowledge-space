<?php

namespace App\Observers;

use App\Models\Partner;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PartnerObserver
{
    /**
     * Handle the Partner "created" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function created(Partner $partner)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($partner);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the Partner "updated" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function updated(Partner $partner)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($partner);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the Partner "saved" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function saved(Partner $partner)
    {
        Cache::tags('partners')->flush();
    }

    /**
     * Handle the Partner "deleted" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function deleted(Partner $partner)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($partner);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);

        Cache::tags('partners')->flush();
    }

    /**
     * Handle the Partner "restored" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function restored(Partner $partner)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($partner);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);

        Cache::tags('partners')->flush();
    }

    /**
     * Handle the Partner "force deleted" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function forceDeleted(Partner $partner)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($partner);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);

        Cache::tags('partners')->flush();
    }
}
