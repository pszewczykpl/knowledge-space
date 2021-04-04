<?php

namespace App\Listeners;

use App\Events\PostCategorySaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class PostCategoryClearCache
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
     * @param  PostCategorySaved  $event
     * @return void
     */
    public function handle(PostCategorySaved $event)
    {
        Cache::tags('post_category')->forget('post_categories_' . $event->postCategory->id);
        Cache::tags('post_categories')->flush();
    }
}
