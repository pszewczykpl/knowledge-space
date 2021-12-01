<?php

namespace App\Observers;

use App\Models\Partner;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PartnerObserver
{
    /**
     * Handle the Partner "saved" event.
     *
     * @param Partner $partner
     * @return void
     */
    public function saved(Partner $partner)
    {
        // Remove all items with "partners" tag
        Cache::tags('partners')->flush();
    }

    /**
     * Handle the Partner "deleted" event.
     *
     * @param Partner $partner
     * @return void
     */
    public function deleted(Partner $partner)
    {
        // Remove all items with "partners" tag
        Cache::tags('partners')->flush();
    }

    /**
     * Handle the Partner "restored" event.
     *
     * @param Partner $partner
     * @return void
     */
    public function restored(Partner $partner)
    {
        // Remove all items with "partners" tag
        Cache::tags('partners')->flush();
    }

    /**
     * Handle the Partner "force deleted" event.
     *
     * @param Partner $partner
     * @return void
     */
    public function forceDeleted(Partner $partner)
    {
        // Remove all items with "partners" tag
        Cache::tags('partners')->flush();
    }
}
