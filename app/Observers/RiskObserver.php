<?php

namespace App\Observers;

use App\Models\Risk;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class RiskObserver
{
    /**
     * Handle the Risk "retrieved" event.
     *
     * @param Risk $risk
     * @return void
     */
    public function retrieved(Risk $risk)
    {
        Cache::add($risk->cacheKey(), $risk);
    }

    /**
     * Handle the Risk "created" event.
     *
     * @param Risk $risk
     * @return void
     */
    public function created(Risk $risk)
    {
        Cache::put($risk->cacheKey(), $risk);
        Cache::tags($risk->cacheTag())->flush();
    }

    /**
     * Handle the Risk "updated" event.
     *
     * @param Risk $risk
     * @return void
     */
    public function updated(Risk $risk)
    {
        Cache::put($risk->cacheKey(), $risk);
        Cache::tags($risk->cacheTag())->flush();
    }

    /**
     * Handle the Risk "deleted" event.
     *
     * @param Risk $risk
     * @return void
     */
    public function deleted(Risk $risk)
    {
        Cache::forget($risk->cacheKey());
        Cache::tags($risk->cacheTag())->flush();
    }
}
