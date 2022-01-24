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
     * @param Department $department
     * @return void
     */
    public function retrieved(Department $department)
    {
        Cache::add($department->cacheKey(), $department);
    }

    /**
     * Handle the Department "created" event.
     *
     * @param Department $department
     * @return void
     */
    public function created(Department $department)
    {
        Cache::put($department->cacheKey(), $department);
        Cache::tags($department->cacheTag())->flush();
    }

    /**
     * Handle the Department "updated" event.
     *
     * @param Department $department
     * @return void
     */
    public function updated(Department $department)
    {
        Cache::put($department->cacheKey(), $department);
        Cache::tags($department->cacheTag())->flush();
    }

    /**
     * Handle the Department "deleted" event.
     *
     * @param Department $department
     * @return void
     */
    public function deleted(Department $department)
    {
        Cache::forget($department->cacheKey());
        Cache::tags($department->cacheTag())->flush();
    }
}
