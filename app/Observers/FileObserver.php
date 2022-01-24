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
     * Handle the File "retrieved" event.
     *
     * @param File $file
     * @return void
     */
    public function retrieved(File $file)
    {
        Cache::add($file->cacheKey(), $file);
    }

    /**
     * Handle the File "created" event.
     *
     * @param File $file
     * @return void
     */
    public function created(File $file)
    {
        Cache::put($file->cacheKey(), $file);
        Cache::tags($file->cacheTag())->flush();
    }

    /**
     * Handle the File "updated" event.
     *
     * @param File $file
     * @return void
     */
    public function updated(File $file)
    {
        Cache::put($file->cacheKey(), $file);
        Cache::tags($file->cacheTag())->flush();
    }

    /**
     * Handle the File "deleted" event.
     *
     * @param File $file
     * @return void
     */
    public function deleted(File $file)
    {
        Cache::forget($file->cacheKey());
        Cache::tags($file->cacheTag())->flush();
    }
}
