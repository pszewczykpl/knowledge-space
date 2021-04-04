<?php

namespace App\Listeners;

use App\Events\NewsSaved;
use Illuminate\Support\Facades\Cache;

class NewsClearCache
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
     * @param  NewsSaved  $event
     * @return void
     */
    public function handle(NewsSaved $event)
    {
        Cache::forget('news_' . $event->news->id);
    }
}
