<?php

namespace App\Observers;

use App\Models\Department;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;

class DepartmentObserver
{
    /**
     * Handle the Department "created" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function created(Department $department)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($department);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Department "updated" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function updated(Department $department)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($department);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Department "saved" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function saved(Department $department)
    {
        Cache::tags('departments')->flush();
    }

    /**
     * Handle the Department "deleted" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function deleted(Department $department)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($department);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Department "restored" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function restored(Department $department)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($department);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Department "force deleted" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function forceDeleted(Department $department)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($department);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }
}
