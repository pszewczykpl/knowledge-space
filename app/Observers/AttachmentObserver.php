<?php

namespace App\Observers;

use App\Models\Attachment;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AttachmentObserver
{
    /**
     * Handle the Attachment "created" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function created(Attachment $attachment)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($attachment);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Attachment "updated" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function updated(Attachment $attachment)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($attachment);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Attachment "saved" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function saved(Attachment $attachment)
    {
        Cache::tags('attachments')->flush();
    }

    /**
     * Handle the Attachment "deleted" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function deleted(Attachment $attachment)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($attachment);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Attachment "restored" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function restored(Attachment $attachment)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($attachment);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the Attachment "force deleted" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function forceDeleted(Attachment $attachment)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($attachment);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }
}
