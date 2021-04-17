<?php

namespace App\Observers;

use App\Models\Attachment;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AttachmentObserver
{
    /**
     * Handle the Attachment "created" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function created(Attachment $attachment)
    {
        //
    }

    /**
     * Handle the Attachment "updated" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function updated(Attachment $attachment)
    {
        //
    }

    /**
     * Handle the Attachment "saved" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function saved(Attachment $attachment)
    {
        Cache::tags('attachments')->flush();
    }

    /**
     * Handle the Attachment "deleted" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function deleted(Attachment $attachment)
    {
        //
    }

    /**
     * Handle the Attachment "restored" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function restored(Attachment $attachment)
    {
        //
    }

    /**
     * Handle the Attachment "force deleted" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function forceDeleted(Attachment $attachment)
    {
        //
    }
}
