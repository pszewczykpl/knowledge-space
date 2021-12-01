<?php

namespace App\Observers;

use App\Models\File;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class FileObserver
{
    /**
     * Handle the File "saved" event.
     *
     * @param File $file
     * @return void
     */
    public function saved(File $file)
    {
        // Remove all items with "files" tag
        Cache::tags('files')->flush();
    }

    /**
     * Handle the File "deleted" event.
     *
     * @param File $file
     * @return void
     */
    public function deleted(File $file)
    {
        // Remove all items with "files" tag
        Cache::tags('files')->flush();
    }

    /**
     * Handle the File "restored" event.
     *
     * @param File $file
     * @return void
     */
    public function restored(File $file)
    {
        // Remove all items with "files" tag
        Cache::tags('files')->flush();
    }

    /**
     * Handle the File "force deleted" event.
     *
     * @param File $file
     * @return void
     */
    public function forceDeleted(File $file)
    {
        // Remove all items with "files" tag
        Cache::tags('files')->flush();
    }
}
