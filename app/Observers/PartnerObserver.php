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
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function saved(Partner $partner)
    {
        Cache::tags('partners')->flush();
    }

    /**
     * Handle the Partner "deleted" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function deleted(Partner $partner)
    {
        Cache::tags('partners')->flush();
    }

    /**
     * Handle the Partner "restored" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function restored(Partner $partner)
    {
        Cache::tags('partners')->flush();
    }

    /**
     * Handle the Partner "force deleted" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function forceDeleted(Partner $partner)
    {
        Cache::tags('partners')->flush();
    }
}
