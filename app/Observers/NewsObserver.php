<?php

namespace App\Observers;

use App\Models\News;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class NewsObserver
{
    /**
     * Handle the News "created" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function created(News $news, User $user)
    {
        $event = new Event();
        $event->event = 'created';
        $event->eventable()->associate($news);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the News "updated" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function updated(News $news)
    {
        $event = new Event();
        $event->event = 'updated';
        $event->eventable()->associate($news);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the News "saved" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function saved(News $news)
    {
        Cache::tags('news')->flush();
    }

    /**
     * Handle the News "deleted" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function deleted(News $news)
    {
        $event = new Event();
        $event->event = 'deleted';
        $event->eventable()->associate($news);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the News "restored" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function restored(News $news)
    {
        $event = new Event();
        $event->event = 'restored';
        $event->eventable()->associate($news);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        $event = new Event();
        $event->event = 'forceDeleted';
        $event->eventable()->associate($news);
        $event->save();

        if(Auth::check()) {
            Auth::user()->events()->save($event);
        }
    }
}
