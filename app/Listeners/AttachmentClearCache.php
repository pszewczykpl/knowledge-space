<?php

namespace App\Listeners;

use App\Events\AttachmentSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

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
     * @param  AttachmentSaved  $event
     * @return void
     */
    public function handle(AttachmentSaved $event)
    {
        Cache::forget('attachments_' . $event->attachment->id);
    }
}
