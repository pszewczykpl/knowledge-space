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
     * Handle the News "retrieved" event.
     *
     * @param News $news
     * @return void
     */
    public function retrieved(News $news)
    {
        Cache::add($news->cacheKey(), $news);
    }

    /**
     * Handle the News "created" event.
     *
     * @param News $news
     * @return void
     */
    public function created(News $news)
    {
        Cache::put($news->cacheKey(), $news);
        Cache::tags($news->cacheTag())->flush();
    }

    /**
     * Handle the News "updated" event.
     *
     * @param News $news
     * @return void
     */
    public function updated(News $news)
    {
        Cache::put($news->cacheKey(), $news);
        Cache::tags($news->cacheTag())->flush();
    }

    /**
     * Handle the News "deleted" event.
     *
     * @param News $news
     * @return void
     */
    public function deleted(News $news)
    {
        Cache::forget($news->cacheKey());
        Cache::tags($news->cacheTag())->flush();
    }

    /**
     * Handle the News "restored" event.
     *
     * @param News $news
     * @return void
     */
    public function restored(News $news)
    {
        Cache::put($news->cacheKey(), $news);
        Cache::tags($news->cacheTag())->flush();
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param News $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        Cache::forget($news->cacheKey());
    }
}
