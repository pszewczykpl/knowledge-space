<?php

namespace App\Providers;

use App\Events\AttachmentSaved;
use App\Events\BancassuranceSaved;
use App\Events\DepartmentSaved;
use App\Events\EmployeeSaved;
use App\Events\FileCategorySaved;
use App\Events\FileSaved;
use App\Events\FundSaved;
use App\Events\InvestmentSaved;
use App\Events\NewsSaved;
use App\Events\NoteSaved;
use App\Events\PartnerSaved;
use App\Events\PostCategorySaved;
use App\Events\PostSaved;
use App\Events\ProtectiveSaved;
use App\Events\ReplySaved;
use App\Events\RiskSaved;
use App\Events\SystemSaved;
use App\Events\UserSaved;
use App\Listeners\AttachmentClearCache;
use App\Listeners\BancassuranceClearCache;
use App\Listeners\DepartmentClearCache;
use App\Listeners\EmployeeClearCache;
use App\Listeners\FileCategoryClearCache;
use App\Listeners\FileClearCache;
use App\Listeners\FundClearCache;
use App\Listeners\InvestmentClearCache;
use App\Listeners\NewsClearCache;
use App\Listeners\NoteClearCache;
use App\Listeners\PartnerClearCache;
use App\Listeners\PostCategoryClearCache;
use App\Listeners\PostClearCache;
use App\Listeners\ProtectiveClearCache;
use App\Listeners\ReplyClearCache;
use App\Listeners\RiskClearCache;
use App\Listeners\SystemClearCache;
use App\Listeners\UserClearCache;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AttachmentSaved::class => [
            AttachmentClearCache::class,
        ],
        BancassuranceSaved::class => [
            BancassuranceClearCache::class,
        ],
        DepartmentSaved::class => [
            DepartmentClearCache::class,
        ],
        EmployeeSaved::class => [
            EmployeeClearCache::class,
        ],
        FileSaved::class => [
            FileClearCache::class,
        ],
        FileCategorySaved::class => [
            FileCategoryClearCache::class,
        ],
        FundSaved::class => [
            FundClearCache::class,
        ],
        InvestmentSaved::class => [
            InvestmentClearCache::class,
        ],
        NewsSaved::class => [
            NewsClearCache::class,
        ],
        NoteSaved::class => [
            NoteClearCache::class,
        ],
        PartnerSaved::class => [
            PartnerClearCache::class,
        ],
        PostSaved::class => [
            PostClearCache::class,
        ],
        PostCategorySaved::class => [
            PostCategoryClearCache::class,
        ],
        ProtectiveSaved::class => [
            ProtectiveClearCache::class,
        ],
        ReplySaved::class => [
            ReplyClearCache::class,
        ],
        RiskSaved::class => [
            RiskClearCache::class,
        ],
        SystemSaved::class => [
            SystemClearCache::class,
        ],
        UserSaved::class => [
            UserClearCache::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
