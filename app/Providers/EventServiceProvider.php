<?php

namespace App\Providers;

use App\Listeners\AttachmentEventSubscriber;
use App\Listeners\BancassuranceEventSubscriber;
use App\Listeners\DepartmentEventSubscriber;
use App\Listeners\EmployeeEventSubscriber;
use App\Listeners\FileCategoryEventSubscriber;
use App\Listeners\FileEventSubscriber;
use App\Listeners\FundEventSubscriber;
use App\Listeners\InvestmentEventSubscriber;
use App\Listeners\NewsEventSubscriber;
use App\Listeners\NoteEventSubscriber;
use App\Listeners\PartnerEventSubscriber;
use App\Listeners\PostCategoryEventSubscriber;
use App\Listeners\PostEventSubscriber;
use App\Listeners\ProtectiveEventSubscriber;
use App\Listeners\ReplyEventSubscriber;
use App\Listeners\RiskEventSubscriber;
use App\Listeners\SystemEventSubscriber;
use App\Listeners\UserEventSubscriber;
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
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        AttachmentEventSubscriber::class,
        BancassuranceEventSubscriber::class,
        DepartmentEventSubscriber::class,
        EmployeeEventSubscriber::class,
        FileEventSubscriber::class,
        FileCategoryEventSubscriber::class,
        FundEventSubscriber::class,
        InvestmentEventSubscriber::class,
        NewsEventSubscriber::class,
        NoteEventSubscriber::class,
        PartnerEventSubscriber::class,
        PostEventSubscriber::class,
        PostCategoryEventSubscriber::class,
        ProtectiveEventSubscriber::class,
        ReplyEventSubscriber::class,
        RiskEventSubscriber::class,
        SystemEventSubscriber::class,
        UserEventSubscriber::class,
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
