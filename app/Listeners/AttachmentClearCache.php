<?php

namespace App\Listeners;

use App\Events\AttachmentUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AttachmentClearCache
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
     * @param  AttachmentUpdated  $event
     * @return void
     */
    public function handle(AttachmentUpdated $event)
    {
        //
    }
}
