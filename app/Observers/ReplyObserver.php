<?php

namespace App\Observers;

use App\Models\Reply;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;

class ReplyObserver
{
    /**
     * Handle the Reply "created" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function created(Reply $reply)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($reply);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Reply "updated" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function updated(Reply $reply)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($reply);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Reply "saved" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function saved(Reply $reply)
    {
        Cache::tags('replies')->flush();
    }

    /**
     * Handle the Reply "deleted" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function deleted(Reply $reply)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($reply);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Reply "restored" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function restored(Reply $reply)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($reply);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Reply "force deleted" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function forceDeleted(Reply $reply)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($reply);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }
}
