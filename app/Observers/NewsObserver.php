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
        Cache::tags('news')->flush();
    }

    /**
     * Handle the News "restored" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function restored(News $news)
    {
        Cache::tags('news')->flush();
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        Cache::tags('news')->flush();
    }
}
