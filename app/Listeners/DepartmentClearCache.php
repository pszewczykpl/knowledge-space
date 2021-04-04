<?php

namespace App\Listeners;

use App\Events\DepartmentUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        //
    }
}
