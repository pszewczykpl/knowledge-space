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
     * @param Note $note
     * @return void
     */
    public function saved(Note $note)
    {
        // Remove all items with "notes" tag
        Cache::tags('notes')->flush();
    }

    /**
     * Handle the Note "deleted" event.
     *
     * @param Note $note
     * @return void
     */
    public function deleted(Note $note)
    {
        // Remove all items with "notes" tag
        Cache::tags('notes')->flush();
    }

    /**
     * Handle the Note "restored" event.
     *
     * @param Note $note
     * @return void
     */
    public function restored(Note $note)
    {
        // Remove all items with "notes" tag
        Cache::tags('notes')->flush();
    }

    /**
     * Handle the Note "force deleted" event.
     *
     * @param Note $note
     * @return void
     */
    public function forceDeleted(Note $note)
    {
        // Remove all items with "notes" tag
        Cache::tags('notes')->flush();
    }
}
