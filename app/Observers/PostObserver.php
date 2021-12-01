<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    /**
     * Handle the Post "saved" event.
     *
     * @param Post $post
     * @return void
     */
    public function saved(Post $post)
    {
        // Remove all items with "posts" tag
        Cache::tags('posts')->flush();
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param Post $post
     * @return void
     */
    public function deleted(Post $post)
    {
        // Remove all items with "posts" tag
        Cache::tags('posts')->flush();
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param Post $post
     * @return void
     */
    public function restored(Post $post)
    {
        // Remove all items with "posts" tag
        Cache::tags('posts')->flush();
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param Post $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        // Remove all items with "posts" tag
        Cache::tags('posts')->flush();
    }
}
