<?php

namespace App\Providers;

use App\Events\AttachmentUpdated;
use App\Events\BancassuranceUpdated;
use App\Events\DepartmentUpdated;
use App\Events\EmployeeUpdated;
use App\Events\FileCategoryUpdated;
use App\Events\FileUpdated;
use App\Events\FundUpdated;
use App\Events\InvestmentUpdated;
use App\Events\NewsUpdated;
use App\Events\NoteUpdated;
use App\Events\PartnerUpdated;
use App\Events\PostCategoryUpdated;
use App\Events\PostUpdated;
use App\Events\ProtectiveUpdated;
use App\Events\ReplyUpdated;
use App\Events\RiskUpdated;
use App\Events\SystemUpdated;
use App\Events\UserUpdated;
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
        AttachmentUpdated::class => [
            AttachmentClearCache::class,
        ],
        BancassuranceUpdated::class => [
            BancassuranceClearCache::class,
        ],
        DepartmentUpdated::class => [
            DepartmentClearCache::class,
        ],
        EmployeeUpdated::class => [
            EmployeeClearCache::class,
        ],
        FileUpdated::class => [
            FileClearCache::class,
        ],
        FileCategoryUpdated::class => [
            FileCategoryClearCache::class,
        ],
        FundUpdated::class => [
            FundClearCache::class,
        ],
        InvestmentUpdated::class => [
            InvestmentClearCache::class,
        ],
        NewsUpdated::class => [
            NewsClearCache::class,
        ],
        NoteUpdated::class => [
            NoteClearCache::class,
        ],
        PartnerUpdated::class => [
            PartnerClearCache::class,
        ],
        PostUpdated::class => [
            PostClearCache::class,
        ],
        PostCategoryUpdated::class => [
            PostCategoryClearCache::class,
        ],
        ProtectiveUpdated::class => [
            ProtectiveClearCache::class,
        ],
        ReplyUpdated::class => [
            ReplyClearCache::class,
        ],
        RiskUpdated::class => [
            RiskClearCache::class,
        ],
        SystemUpdated::class => [
            SystemClearCache::class,
        ],
        UserUpdated::class => [
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
