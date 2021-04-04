<?php

namespace App\Listeners;

use App\Events\DepartmentUpdated;
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
     * @param  DepartmentUpdated  $event
     * @return void
     */
    public function handle(DepartmentUpdated $event)
    {
        Cache::forget('departments_' . $event->department->id);
    }
}
