<?php

namespace App\Observers;

use App\Models\PostCategory;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostCategoryObserver
{
    /**
     * Handle the PostCategory "retrieved" event.
     *
     * @param PostCategory $postCategory
     * @return void
     */
    public function retrieved(PostCategory $postCategory)
    {
        Cache::add($postCategory->cacheKey(), $postCategory);
    }

    /**
     * Handle the PostCategory "created" event.
     *
     * @param PostCategory $postCategory
     * @return void
     */
    public function created(PostCategory $postCategory)
    {
        Cache::put($postCategory->cacheKey(), $postCategory);
        Cache::tags($postCategory->cacheTag())->flush();
    }

    /**
     * Handle the PostCategory "updated" event.
     *
     * @param PostCategory $postCategory
     * @return void
     */
    public function updated(PostCategory $postCategory)
    {
        Cache::put($postCategory->cacheKey(), $postCategory);
        Cache::tags($postCategory->cacheTag())->flush();
    }

    /**
     * Handle the PostCategory "deleted" event.
     *
     * @param PostCategory $postCategory
     * @return void
     */
    public function deleted(PostCategory $postCategory)
    {
        Cache::forget($postCategory->cacheKey());
        Cache::tags($postCategory->cacheTag())->flush();
    }

    /**
     * Handle the PostCategory "restored" event.
     *
     * @param PostCategory $postCategory
     * @return void
     */
    public function restored(PostCategory $postCategory)
    {
        Cache::put($postCategory->cacheKey(), $postCategory);
        Cache::tags($postCategory->cacheTag())->flush();
    }

    /**
     * Handle the PostCategory "force deleted" event.
     *
     * @param PostCategory $postCategory
     * @return void
     */
    public function forceDeleted(PostCategory $postCategory)
    {
        Cache::forget($postCategory->cacheKey());
    }
}
