<?php

namespace App\Observers;

use App\Models\Permission;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PermissionObserver
{
    /**
     * Handle the Permission "saved" event.
     *
     * @param  \App\Models\Permission  $permission
     * @return void
     */
    public function saved(Permission $permission)
    {
        Cache::tags('permissions')->flush();
    }

    /**
     * Handle the Permission "deleted" event.
     *
     * @param  \App\Models\Permission  $permission
     * @return void
     */
    public function deleted(Permission $permission)
    {
        Cache::tags('permissions')->flush();
    }

    /**
     * Handle the Permission "restored" event.
     *
     * @param  \App\Models\Permission  $permission
     * @return void
     */
    public function restored(Permission $permission)
    {
        Cache::tags('permissions')->flush();
    }

    /**
     * Handle the Permission "force deleted" event.
     *
     * @param  \App\Models\Permission  $permission
     * @return void
     */
    public function forceDeleted(Permission $permission)
    {
        Cache::tags('permissions')->flush();
    }
}
