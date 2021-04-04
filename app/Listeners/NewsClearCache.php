<?php

namespace App\Listeners;

use App\Events\NewsUpdated;
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
     * @param  NewsUpdated  $event
     * @return void
     */
    public function handle(NewsUpdated $event)
    {
        Cache::forget('news_' . $event->news->id);
    }
}
