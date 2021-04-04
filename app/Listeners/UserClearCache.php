<?php

namespace App\Listeners;

use App\Events\UserSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class UserClearCache
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserSaved  $event
     * @return void
     */
    public function handle(UserSaved $event)
    {
        // Delete all users in cache
        Cache::tags('user')->flush();

        // and others with users information
        Cache::tags('users')->flush();
    }
}
