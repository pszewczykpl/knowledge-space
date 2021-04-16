<?php

namespace App\Observers;

use App\Models\PostCategory;
use Illuminate\Support\Facades\Cache;

class PostCategoryObserver
{
    /**
     * Handle the PostCategory "created" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function created(PostCategory $postCategory)
    {
        //
    }

    /**
     * Handle the PostCategory "updated" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function updated(PostCategory $postCategory)
    {
        //
    }

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
        //
    }

    /**
     * Handle the PostCategory "restored" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function restored(PostCategory $postCategory)
    {
        //
    }

    /**
     * Handle the PostCategory "force deleted" event.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return void
     */
    public function forceDeleted(PostCategory $postCategory)
    {
        //
    }
}
