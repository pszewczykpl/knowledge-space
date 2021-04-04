<?php

namespace App\Listeners;

use App\Events\FileCategorySaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

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
     * @param  FileCategorySaved  $event
     * @return void
     */
    public function handle(FileCategorySaved $event)
    {
        Cache::forget('file_categories_' . $event->fileCategory->id);
    }
}
