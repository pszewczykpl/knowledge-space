<?php

namespace App\Observers;

use App\Models\Note;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class NoteObserver
{
    /**
     * Handle the Note "saved" event.
     *
     * @param  \App\Models\Note  $note
     * @return void
     */
    public function saved(Note $note)
    {
        Cache::tags('notes')->flush();
    }

    /**
     * Handle the Note "deleted" event.
     *
     * @param  \App\Models\Note  $note
     * @return void
     */
    public function deleted(Note $note)
    {
        Cache::tags('notes')->flush();
    }

    /**
     * Handle the Note "restored" event.
     *
     * @param  \App\Models\Note  $note
     * @return void
     */
    public function restored(Note $note)
    {
        Cache::tags('notes')->flush();
    }

    /**
     * Handle the Note "force deleted" event.
     *
     * @param  \App\Models\Note  $note
     * @return void
     */
    public function forceDeleted(Note $note)
    {
        Cache::tags('notes')->flush();
    }
}
