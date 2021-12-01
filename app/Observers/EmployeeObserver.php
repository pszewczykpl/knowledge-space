<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class EmployeeObserver
{
    /**
     * Handle the Employee "saved" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function saved(Employee $employee)
    {
        // Remove all items with "employees" tag
        Cache::tags('employees')->flush();
    }

    /**
     * Handle the Employee "deleted" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function deleted(Employee $employee)
    {
        // Remove all items with "employees" tag
        Cache::tags('employees')->flush();
    }

    /**
     * Handle the Employee "restored" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function restored(Employee $employee)
    {
        // Remove all items with "employees" tag
        Cache::tags('employees')->flush();
    }

    /**
     * Handle the Employee "force deleted" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function forceDeleted(Employee $employee)
    {
        // Remove all items with "employees" tag
        Cache::tags('employees')->flush();
    }
}
