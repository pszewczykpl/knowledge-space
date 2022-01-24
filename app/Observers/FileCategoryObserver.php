<?php

namespace App\Observers;

use App\Models\FileCategory;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class FileCategoryObserver
{
    /**
     * Handle the FileCategory "retrieved" event.
     *
     * @param FileCategory $fileCategory
     * @return void
     */
    public function retrieved(FileCategory $fileCategory)
    {
        Cache::add($fileCategory->cacheKey(), $fileCategory);
    }

    /**
     * Handle the FileCategory "created" event.
     *
     * @param FileCategory $fileCategory
     * @return void
     */
    public function created(FileCategory $fileCategory)
    {
        Cache::put($fileCategory->cacheKey(), $fileCategory);
        Cache::tags($fileCategory->cacheTag())->flush();
    }

    /**
     * Handle the FileCategory "updated" event.
     *
     * @param FileCategory $fileCategory
     * @return void
     */
    public function updated(FileCategory $fileCategory)
    {
        Cache::put($fileCategory->cacheKey(), $fileCategory);
        Cache::tags($fileCategory->cacheTag())->flush();
    }

    /**
     * Handle the FileCategory "deleted" event.
     *
     * @param FileCategory $fileCategory
     * @return void
     */
    public function deleted(FileCategory $fileCategory)
    {
        Cache::forget($fileCategory->cacheKey());
        Cache::tags($fileCategory->cacheTag())->flush();
    }
}
