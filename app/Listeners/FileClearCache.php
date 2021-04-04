<?php

namespace App\Listeners;

use App\Events\FileUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  FileUpdate  $event
     * @return void
     */
    public function handle(FileUpdate $event)
    {
        //
    }
}
