<?php

namespace App\Observers;

use App\Models\Department;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DepartmentObserver
{
    /**
     * Handle the Department "saved" event.
     *
     * @param Department $department
     * @return void
     */
    public function saved(Department $department)
    {
        Cache::forget("departments:$department->id");
        // Remove all items with "departments" tag
        Cache::tags('departments')->flush();
    }

    /**
     * Handle the Department "deleted" event.
     *
     * @param Department $department
     * @return void
     */
    public function deleted(Department $department)
    {
        // Remove all items with "departments" tag
        Cache::tags('departments')->flush();
    }

    /**
     * Handle the Department "restored" event.
     *
     * @param Department $department
     * @return void
     */
    public function restored(Department $department)
    {
        // Remove all items with "departments" tag
        Cache::tags('departments')->flush();
    }

    /**
     * Handle the Department "force deleted" event.
     *
     * @param Department $department
     * @return void
     */
    public function forceDeleted(Department $department)
    {
        // Remove all items with "departments" tag
        Cache::tags('departments')->flush();
    }
}
