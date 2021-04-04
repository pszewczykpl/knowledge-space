<?php

namespace App\Listeners;

use App\Events\PostCategoryUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  PostCategoryUpdate  $event
     * @return void
     */
    public function handle(PostCategoryUpdate $event)
    {
        //
    }
}
