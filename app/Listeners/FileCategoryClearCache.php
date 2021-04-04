<?php

namespace App\Listeners;

use App\Events\FileCategoryUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FileCategoryClearCache
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
     * @param  FileCategoryUpdate  $event
     * @return void
     */
    public function handle(FileCategoryUpdate $event)
    {
        //
    }
}
