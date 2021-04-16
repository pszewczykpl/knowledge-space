<?php

namespace App\Observers;

use App\Models\Risk;
use Illuminate\Support\Facades\Cache;

class RiskObserver
{
    /**
     * Handle the Risk "created" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function created(Risk $risk)
    {
        //
    }

    /**
     * Handle the Risk "updated" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function updated(Risk $risk)
    {
        //
    }

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
        //
    }

    /**
     * Handle the Risk "restored" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function restored(Risk $risk)
    {
        //
    }

    /**
     * Handle the Risk "force deleted" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function forceDeleted(Risk $risk)
    {
        //
    }
}
