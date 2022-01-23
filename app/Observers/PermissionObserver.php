<?php

namespace App\Observers;

use App\Models\Permission;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PermissionObserver
{
    /**
     * Handle the Permission "retrieved" event.
     *
     * @param Permission $permission
     * @return void
     */
    public function retrieved(Permission $permission)
    {
        Cache::add($permission->cacheKey(), $permission);
    }

    /**
     * Handle the Permission "created" event.
     *
     * @param Permission $permission
     * @return void
     */
    public function created(Permission $permission)
    {
        Cache::put($permission->cacheKey(), $permission);
        Cache::tags($permission->cacheTag())->flush();
    }

    /**
     * Handle the Permission "updated" event.
     *
     * @param Permission $permission
     * @return void
     */
    public function updated(Permission $permission)
    {
        Cache::put($permission->cacheKey(), $permission);
        Cache::tags($permission->cacheTag())->flush();
    }
}
