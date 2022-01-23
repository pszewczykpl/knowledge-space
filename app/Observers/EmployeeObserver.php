<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class EmployeeObserver
{
    /**
     * Handle the Employee "retrieved" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function retrieved(Employee $employee)
    {
        Cache::add($employee->cacheKey(), $employee);
    }

    /**
     * Handle the Employee "created" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function created(Employee $employee)
    {
        Cache::put($employee->cacheKey(), $employee);
        Cache::tags($employee->cacheTag())->flush();
    }

    /**
     * Handle the Employee "updated" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function updated(Employee $employee)
    {
        Cache::put($employee->cacheKey(), $employee);
        Cache::tags($employee->cacheTag())->flush();
    }

    /**
     * Handle the Employee "deleted" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function deleted(Employee $employee)
    {
        Cache::forget($employee->cacheKey());
        Cache::tags($employee->cacheTag())->flush();
    }

    /**
     * Handle the Employee "restored" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function restored(Employee $employee)
    {
        Cache::put($employee->cacheKey(), $employee);
        Cache::tags($employee->cacheTag())->flush();
    }

    /**
     * Handle the Employee "force deleted" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function forceDeleted(Employee $employee)
    {
        Cache::forget($employee->cacheKey());
    }
}
