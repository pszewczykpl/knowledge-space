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
        Cache::forget('users_' . $event->user->id);
        Cache::forget('users_' . $event->user->id . '_permissions_all');
    }
}
