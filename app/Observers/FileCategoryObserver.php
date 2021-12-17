<?php

namespace App\Observers;

use App\Models\FileCategory;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class FileCategoryObserver
{
    /**
     * Handle the FileCategory "saved" event.
     *
     * @param FileCategory $fileCategory
     * @return void
     */
    public function saved(FileCategory $fileCategory)
    {
        Cache::forget("file_categories:$fileCategory->id");
        // Remove all items with "file_categories" tag
        Cache::tags('file_categories')->flush();
    }

    /**
     * Handle the FileCategory "deleted" event.
     *
     * @param FileCategory $fileCategory
     * @return void
     */
    public function deleted(FileCategory $fileCategory)
    {
        // Remove all items with "file_categories" tag
        Cache::tags('file_categories')->flush();
    }

    /**
     * Handle the FileCategory "restored" event.
     *
     * @param FileCategory $fileCategory
     * @return void
     */
    public function restored(FileCategory $fileCategory)
    {
        // Remove all items with "file_categories" tag
        Cache::tags('file_categories')->flush();
    }

    /**
     * Handle the FileCategory "force deleted" event.
     *
     * @param FileCategory $fileCategory
     * @return void
     */
    public function forceDeleted(FileCategory $fileCategory)
    {
        // Remove all items with "file_categories" tag
        Cache::tags('file_categories')->flush();
    }
}
