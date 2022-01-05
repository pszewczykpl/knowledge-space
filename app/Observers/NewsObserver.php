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
     * @param News $news
     * @return void
     */
    public function saved(News $news)
    {
        Cache::forget("news:$news->id");
        // Remove all items with "news" tag
        Cache::tags('news')->flush();
    }

    /**
     * Handle the News "deleted" event.
     *
     * @param News $news
     * @return void
     */
    public function deleted(News $news)
    {
        // Remove all items with "news" tag
        Cache::tags('news')->flush();
    }

    /**
     * Handle the News "restored" event.
     *
     * @param News $news
     * @return void
     */
    public function restored(News $news)
    {
        // Remove all items with "news" tag
        Cache::tags('news')->flush();
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param News $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        // Remove all items with "news" tag
        Cache::tags('news')->flush();
    }
}
