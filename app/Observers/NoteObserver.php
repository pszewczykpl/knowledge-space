<?php

namespace App\Observers;

use App\Models\Note;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class NoteObserver
{
    /**
     * Handle the Note "retrieved" event.
     *
     * @param Note $note
     * @return void
     */
    public function retrieved(Note $note)
    {
        Cache::add($note->cacheKey(), $note);
    }

    /**
     * Handle the Note "created" event.
     *
     * @param Note $note
     * @return void
     */
    public function created(Note $note)
    {
        Cache::put($note->cacheKey(), $note);
        Cache::tags($note->cacheTag())->flush();
    }

    /**
     * Handle the Note "updated" event.
     *
     * @param Note $note
     * @return void
     */
    public function updated(Note $note)
    {
        Cache::put($note->cacheKey(), $note);
        Cache::tags($note->cacheTag())->flush();
    }

    /**
     * Handle the Note "deleted" event.
     *
     * @param Note $note
     * @return void
     */
    public function deleted(Note $note)
    {
        Cache::forget($note->cacheKey());
        Cache::tags($note->cacheTag())->flush();
    }
}
