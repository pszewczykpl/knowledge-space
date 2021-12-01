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
     * @param PostCategory $postCategory
     * @return void
     */
    public function saved(PostCategory $postCategory)
    {
        // Remove all items with "post_categories" tag
        Cache::tags('post_categories')->flush();
    }

    /**
     * Handle the PostCategory "deleted" event.
     *
     * @param PostCategory $postCategory
     * @return void
     */
    public function deleted(PostCategory $postCategory)
    {
        // Remove all items with "post_categories" tag
        Cache::tags('post_categories')->flush();
    }

    /**
     * Handle the PostCategory "restored" event.
     *
     * @param PostCategory $postCategory
     * @return void
     */
    public function restored(PostCategory $postCategory)
    {
        // Remove all items with "post_categories" tag
        Cache::tags('post_categories')->flush();
    }

    /**
     * Handle the PostCategory "force deleted" event.
     *
     * @param PostCategory $postCategory
     * @return void
     */
    public function forceDeleted(PostCategory $postCategory)
    {
        // Remove all items with "post_categories" tag
        Cache::tags('post_categories')->flush();
    }
}
