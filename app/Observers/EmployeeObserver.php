<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class EmployeeObserver
{
    /**
     * Handle the Employee "created" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function created(Employee $employee)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($employee);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Employee "updated" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function updated(Employee $employee)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($employee);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Employee "saved" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function saved(Employee $employee)
    {
        Cache::tags('employees')->flush();
    }

    /**
     * Handle the Employee "deleted" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function deleted(Employee $employee)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($employee);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Employee "restored" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function restored(Employee $employee)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($employee);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Employee "force deleted" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function forceDeleted(Employee $employee)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($employee);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }
}
