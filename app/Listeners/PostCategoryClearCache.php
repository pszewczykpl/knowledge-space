<?php

namespace App\Listeners;

use App\Events\PostCategoryUpdated;
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
     * @param  PostCategoryUpdated  $event
     * @return void
     */
    public function handle(PostCategoryUpdated $event)
    {
        Cache::forget('post_categories_' . $event->postCategory->id);
    }
}
