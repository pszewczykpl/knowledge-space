<?php

namespace App\Observers;

use App\Models\PostCategory;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostCategoryObserver
{
    /**
     * Handle the PostCategory "saved" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function saved(PostCategory $postCategory)
    {
        Cache::tags('post_categories')->flush();
    }

    /**
     * Handle the PostCategory "deleted" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function deleted(PostCategory $postCategory)
    {
        Cache::tags('post_categories')->flush();
    }

    /**
     * Handle the PostCategory "restored" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function restored(PostCategory $postCategory)
    {
        Cache::tags('post_categories')->flush();
    }

    /**
     * Handle the PostCategory "force deleted" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function forceDeleted(PostCategory $postCategory)
    {
        Cache::tags('post_categories')->flush();
    }
}
