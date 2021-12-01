<?php

namespace App\Observers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserObserver
{
    /**
     * Handle the User "saved" event.
     *
     * @param User $user
     * @return void
     */
    public function saved(User $user)
    {
        // Remove all items with "users" tag
        Cache::tags('users')->flush();
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function deleted(User $user)
    {
        // Remove all items with "users" tag
        Cache::tags('users')->flush();
    }

    /**
     * Handle the User "restored" event.
     *
     * @param User $user
     * @return void
     */
    public function restored(User $user)
    {
        // Remove all items with "users" tag
        Cache::tags('users')->flush();
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        // Remove all items with "users" tag
        Cache::tags('users')->flush();
    }
}
