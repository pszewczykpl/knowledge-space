<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    /**
     * Handle the Post "retrieved" event.
     *
     * @param Post $post
     * @return void
     */
    public function retrieved(Post $post)
    {
        Cache::add($post->cacheKey(), $post);
    }

    /**
     * Handle the Post "created" event.
     *
     * @param Post $post
     * @return void
     */
    public function created(Post $post)
    {
        Cache::put($post->cacheKey(), $post);
        Cache::tags($post->cacheTag())->flush();
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param Post $post
     * @return void
     */
    public function updated(Post $post)
    {
        Cache::put($post->cacheKey(), $post);
        Cache::tags($post->cacheTag())->flush();
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param Post $post
     * @return void
     */
    public function deleted(Post $post)
    {
        Cache::forget($post->cacheKey());
        Cache::tags($post->cacheTag())->flush();
    }
}
