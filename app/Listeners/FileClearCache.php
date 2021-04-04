<?php

namespace App\Listeners;

use App\Events\FileSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class FileClearCache
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
     * @param  FileSaved  $event
     * @return void
     */
    public function handle(FileSaved $event)
    {
        Cache::forget('files_' . $event->file->id);
        Cache::tags('files')->flush();
    }
}
