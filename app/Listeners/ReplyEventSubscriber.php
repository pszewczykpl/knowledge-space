<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class NoteEventSubscriber
{
    /**
     * Handle note deleted events.
     * @param $event
     */
    public function handleNoteCreated($event) {
        $event_entry = new Event();
        $event_entry->event = 'created';
        $event_entry->eventable()->associate($event->note);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle note deleted events.
     * @param $event
     */
    public function handleNoteUpdated($event) {
        $event_entry = new Event();
        $event_entry->event = 'updated';
        $event_entry->eventable()->associate($event->note);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Handle note saved events.
     * @param $event
     */
    public function handleNoteSaved($event) {
        Cache::tags('note')->forget('notes_' . $event->note->id);
        Cache::tags('notes')->flush();
    }

    /**
     * Handle note deleted events.
     * @param $event
     */
    public function handleNoteDeleted($event) {
        Cache::tags('note')->forget('notes_' . $event->note->id);
        Cache::tags('notes')->flush();

        $event_entry = new Event();
        $event_entry->event = 'deleted';
        $event_entry->eventable()->associate($event->note);
        Auth::user()->events()->save($event_entry);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\NoteCreated',
            [NoteEventSubscriber::class, 'handleNoteCreated']
        );

        $events->listen(
            'App\Events\NoteUpdated',
            [NoteEventSubscriber::class, 'handleNoteUpdated']
        );

        $events->listen(
            'App\Events\NoteSaved',
            [NoteEventSubscriber::class, 'handleNoteSaved']
        );

        $events->listen(
            'App\Events\NoteDeleted',
            [NoteEventSubscriber::class, 'handleNoteDeleted']
        );
    }
}