<?php

namespace App\Listeners;

use App\Events\DepartmentSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class DepartmentClearCache
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
     * @param  DepartmentSaved  $event
     * @return void
     */
    public function handle(DepartmentSaved $event)
    {
        Cache::tags('department')->forget('departments_' . $event->department->id);
        Cache::tags('departments')->flush();
    }
}
