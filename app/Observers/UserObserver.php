<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserObserver
{
    /**
     * Handle the User "retrieved" event.
     *
     * @param User $user
     * @return void
     */
    public function retrieved(User $user)
    {
        Cache::add($user->cacheKey(), $user);
    }

    /**
     * Handle the User "created" event.
     *
     * @param User $user
     * @return void
     */
    public function created(User $user)
    {
        Cache::put($user->cacheKey(), $user);
        Cache::tags($user->cacheTag())->flush();
    }

    /**
     * Handle the User "updated" event.
     *
     * @param User $user
     * @return void
     */
    public function updated(User $user)
    {
        Cache::put($user->cacheKey(), $user);
        Cache::tags($user->cacheTag())->flush();
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function deleted(User $user)
    {
        Cache::forget($user->cacheKey());
        Cache::tags($user->cacheTag())->flush();
    }

    /**
     * Handle the User "restored" event.
     *
     * @param User $user
     * @return void
     */
    public function restored(User $user)
    {
        Cache::put($user->cacheKey(), $user);
        Cache::tags($user->cacheTag())->flush();
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        Cache::forget($user->cacheKey());
    }
}
