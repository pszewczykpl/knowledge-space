<?php

namespace App\Listeners;

use App\Events\EmployeeUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class EmployeeClearCache
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EmployeeUpdated  $event
     * @return void
     */
    public function handle(EmployeeUpdated $event)
    {
        Cache::forget('employees_' . $event->employee->id);
    }
}
