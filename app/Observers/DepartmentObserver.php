<?php

namespace App\Observers;

use App\Models\Department;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DepartmentObserver
{
    /**
     * Handle the Department "retrieved" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function retrieved(Department $department)
    {
        //
    }

    /**
     * Handle the Department "created" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function created(Department $department)
    {
        //
    }

    /**
     * Handle the Department "updated" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function updated(Department $department)
    {
        //
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
        Cache::tags('departments')->flush();
    }

    /**
     * Handle the Department "restored" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function restored(Department $department)
    {
        Cache::tags('departments')->flush();
    }

    /**
     * Handle the Department "force deleted" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function forceDeleted(Department $department)
    {
        Cache::tags('departments')->flush();
    }
}
