<?php

namespace App\Observers;

use App\Models\Permission;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PermissionObserver
{
    /**
     * Handle the Permission "created" event.
     *
     * @param  \App\Models\Permission  $permission
     * @return void
     */
    public function created(Permission $permission)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($permission);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the Permission "updated" event.
     *
     * @param  \App\Models\Permission  $permission
     * @return void
     */
    public function updated(Permission $permission)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($permission);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the Permission "deleted" event.
     *
     * @param  \App\Models\Permission  $permission
     * @return void
     */
    public function deleted(Permission $permission)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($permission);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the Permission "restored" event.
     *
     * @param  \App\Models\Permission  $permission
     * @return void
     */
    public function restored(Permission $permission)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($permission);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }

    /**
     * Handle the Permission "force deleted" event.
     *
     * @param  \App\Models\Permission  $permission
     * @return void
     */
    public function forceDeleted(Permission $permission)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($permission);
        $event->save();

        if(Auth::check()) Auth::user()->events()->save($event);
    }
}
