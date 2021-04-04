<?php

namespace App\Listeners;

use App\Events\FileUpdated;
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
     * @param  FileUpdated  $event
     * @return void
     */
    public function handle(FileUpdated $event)
    {
        Cache::forget('files_' . $event->file->id);
    }
}
