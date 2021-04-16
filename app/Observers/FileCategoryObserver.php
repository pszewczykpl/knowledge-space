<?php

namespace App\Observers;

use App\Models\FileCategory;
use Illuminate\Support\Facades\Cache;

class FileCategoryObserver
{
    /**
     * Handle the FileCategory "created" event.
     *
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function created(FileCategory $fileCategory)
    {
        //
    }

    /**
     * Handle the FileCategory "updated" event.
     *
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function updated(FileCategory $fileCategory)
    {
        //
    }

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
        //
    }

    /**
     * Handle the FileCategory "restored" event.
     *
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function restored(FileCategory $fileCategory)
    {
        //
    }

    /**
     * Handle the FileCategory "force deleted" event.
     *
     * @param  \App\Models\FileCategory  $fileCategory
     * @return void
     */
    public function forceDeleted(FileCategory $fileCategory)
    {
        //
    }
}
