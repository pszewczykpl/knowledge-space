<?php

namespace App\Providers;

use App\Models\Bancassurance;
use App\Models\Department;
use App\Models\Employee;
use App\Models\File;
use App\Models\FileCategory;
use App\Models\Fund;
use App\Models\Investment;
use App\Models\News;
use App\Models\Note;
use App\Models\Partner;
use App\Models\Permission;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Protective;
use App\Models\Reply;
use App\Models\Risk;
use App\Models\System;
use App\Models\User;
use App\Observers\BancassuranceObserver;
use App\Observers\DepartmentObserver;
use App\Observers\EmployeeObserver;
use App\Observers\FileCategoryObserver;
use App\Observers\FileObserver;
use App\Observers\FundObserver;
use App\Observers\InvestmentObserver;
use App\Observers\NewsObserver;
use App\Observers\NoteObserver;
use App\Observers\PartnerObserver;
use App\Observers\PermissionObserver;
use App\Observers\PostCategoryObserver;
use App\Observers\PostObserver;
use App\Observers\ProtectiveObserver;
use App\Observers\ReplyObserver;
use App\Observers\RiskObserver;
use App\Observers\SystemObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'Illuminate\Auth\Events\Verified' => [
            'App\Listeners\LogVerifiedUser',
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

        Bancassurance::observe(BancassuranceObserver::class);
        Department::observe(DepartmentObserver::class);
        Employee::observe(EmployeeObserver::class);
        FileCategory::observe(FileCategoryObserver::class);
        File::observe(FileObserver::class);
        Fund::observe(FundObserver::class);
        Investment::observe(InvestmentObserver::class);
        News::observe(NewsObserver::class);
        Note::observe(NoteObserver::class);
        Partner::observe(PartnerObserver::class);
        Permission::observe(PermissionObserver::class);
        PostCategory::observe(PostCategoryObserver::class);
        Post::observe(PostObserver::class);
        Protective::observe(ProtectiveObserver::class);
        Reply::observe(ReplyObserver::class);
        Risk::observe(RiskObserver::class);
        System::observe(SystemObserver::class);
        User::observe(UserObserver::class);
    }
}
