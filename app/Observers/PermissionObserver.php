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
     * @param Permission $permission
     * @return void
     */
    public function saved(Permission $permission)
    {
        // Remove all items with "permissions" tag
        Cache::tags('permissions')->flush();
    }
}
