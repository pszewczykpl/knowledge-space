<?php

namespace App\Listeners;

use App\Events\NoteUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NoteClearCache
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
     * @param  NoteUpdate  $event
     * @return void
     */
    public function handle(NoteUpdate $event)
    {
        //
    }
}
