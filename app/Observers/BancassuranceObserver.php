<?php

namespace App\Observers;

use App\Models\Bancassurance;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class BancassuranceObserver
{
    /**
     * Handle the Bancassurance "retrieved" event.
     *
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return void
     */
    public function retrieved(Bancassurance $bancassurance)
    {
        //
    }

    /**
     * Handle the Bancassurance "created" event.
     *
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return void
     */
    public function created(Bancassurance $bancassurance)
    {
        //
    }

    /**
     * Handle the Bancassurance "updated" event.
     *
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return void
     */
    public function updated(Bancassurance $bancassurance)
    {
        //
    }

    /**
     * Handle the Bancassurance "saved" event.
     *
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return void
     */
    public function saved(Bancassurance $bancassurance)
    {
        Cache::tags('bancassurances')->flush();
    }

    /**
     * Handle the Bancassurance "deleted" event.
     *
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return void
     */
    public function deleted(Bancassurance $bancassurance)
    {
        Cache::tags('bancassurances')->flush();
    }

    /**
     * Handle the Bancassurance "restored" event.
     *
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return void
     */
    public function restored(Bancassurance $bancassurance)
    {
        Cache::tags('bancassurances')->flush();
    }

    /**
     * Handle the Bancassurance "force deleted" event.
     *
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return void
     */
    public function forceDeleted(Bancassurance $bancassurance)
    {
        Cache::tags('bancassurances')->flush();
    }
}
