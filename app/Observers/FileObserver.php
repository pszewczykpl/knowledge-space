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
     * @param  \App\Models\File  $file
     * @return void
     */
    public function saved(File $file)
    {
        Cache::tags('files')->flush();
    }

    /**
     * Handle the File "deleted" event.
     *
     * @param  \App\Models\File  $file
     * @return void
     */
    public function deleted(File $file)
    {
        Cache::tags('files')->flush();
    }

    /**
     * Handle the File "restored" event.
     *
     * @param  \App\Models\File  $file
     * @return void
     */
    public function restored(File $file)
    {
        Cache::tags('files')->flush();
    }

    /**
     * Handle the File "force deleted" event.
     *
     * @param  \App\Models\File  $file
     * @return void
     */
    public function forceDeleted(File $file)
    {
        Cache::tags('files')->flush();
    }
}
