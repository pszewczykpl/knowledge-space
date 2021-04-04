<?php

namespace App\Listeners;

use App\Events\FileCategoryUpdated;
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
     * @param  FileCategoryUpdated  $event
     * @return void
     */
    public function handle(FileCategoryUpdated $event)
    {
        Cache::forget('file_categories_' . $event->fileCategory->id);
    }
}
