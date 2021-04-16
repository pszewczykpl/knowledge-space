<?php

namespace App\Providers;

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
        //
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        \App\Models\Attachment::observe(\App\Observers\AttachmentObserver::class);
        \App\Models\Bancassurance::observe(\App\Observers\BancassuranceObserver::class);
        \App\Models\Department::observe(\App\Observers\DepartmentObserver::class);
        \App\Models\Employee::observe(\App\Observers\EmployeeObserver::class);
        \App\Models\Event::observe(\App\Observers\EventObserver::class);
        \App\Models\FileCategory::observe(\App\Observers\FileCategoryObserver::class);
        \App\Models\File::observe(\App\Observers\FileObserver::class);
        \App\Models\Fund::observe(\App\Observers\FundObserver::class);
        \App\Models\Investment::observe(\App\Observers\InvestmentObserver::class);
        \App\Models\News::observe(\App\Observers\NewsObserver::class);
        \App\Models\Note::observe(\App\Observers\NoteObserver::class);
        \App\Models\Partner::observe(\App\Observers\PartnerObserver::class);
        \App\Models\Event::observe(\App\Observers\EventObserver::class);
        \App\Models\Permission::observe(\App\Observers\PermissionObserver::class);
        \App\Models\PostCategory::observe(\App\Observers\PostCategoryObserver::class);
        \App\Models\Post::observe(\App\Observers\PostObserver::class);
        \App\Models\Protective::observe(\App\Observers\ProtectiveObserver::class);
        \App\Models\Reply::observe(\App\Observers\ReplyObserver::class);
        \App\Models\Risk::observe(\App\Observers\RiskObserver::class);
        \App\Models\System::observe(\App\Observers\SystemObserver::class);
        \App\Models\User::observe(\App\Observers\UserObserver::class);
    }
}
