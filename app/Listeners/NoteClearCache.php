<?php

namespace App\Listeners;

use App\Events\NoteUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

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
     * @param  NoteUpdated  $event
     * @return void
     */
    public function handle(NoteUpdated $event)
    {
        Cache::forget('notes_' . $event->note->id);
    }
}
