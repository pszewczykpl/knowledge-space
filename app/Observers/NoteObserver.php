<?php

namespace App\Observers;

use App\Models\Note;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;

class NoteObserver
{
    /**
     * Handle the Note "created" event.
     *
     * @param  \App\Models\Note  $note
     * @return void
     */
    public function created(Note $note)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($note);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Note "updated" event.
     *
     * @param  \App\Models\Note  $note
     * @return void
     */
    public function updated(Note $note)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($note);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

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
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($note);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Note "restored" event.
     *
     * @param  \App\Models\Note  $note
     * @return void
     */
    public function restored(Note $note)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($note);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Note "force deleted" event.
     *
     * @param  \App\Models\Note  $note
     * @return void
     */
    public function forceDeleted(Note $note)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($note);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }
}
