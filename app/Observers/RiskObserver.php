<?php

namespace App\Observers;

use App\Models\Risk;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class RiskObserver
{
    /**
     * Handle the Risk "saved" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function saved(Risk $risk)
    {
        Cache::tags('risks')->flush();
    }

    /**
     * Handle the Risk "deleted" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function deleted(Risk $risk)
    {
        Cache::tags('risks')->flush();
    }

    /**
     * Handle the Risk "restored" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function restored(Risk $risk)
    {
        Cache::tags('risks')->flush();
    }

    /**
     * Handle the Risk "force deleted" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function forceDeleted(Risk $risk)
    {
        Cache::tags('risks')->flush();
    }
}
