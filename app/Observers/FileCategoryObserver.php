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
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function saved(FileCategory $fileCategory)
    {
        Cache::tags('file_categories')->flush();
    }

    /**
     * Handle the FileCategory "deleted" event.
     *
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function deleted(FileCategory $fileCategory)
    {
        Cache::tags('file_categories')->flush();
    }

    /**
     * Handle the FileCategory "restored" event.
     *
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function restored(FileCategory $fileCategory)
    {
        Cache::tags('file_categories')->flush();
    }

    /**
     * Handle the FileCategory "force deleted" event.
     *
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function forceDeleted(FileCategory $fileCategory)
    {
        Cache::tags('file_categories')->flush();
    }
}
