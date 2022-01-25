<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\Department::class => \App\Policies\DepartmentPolicy::class,
        \App\Models\Employee::class => \App\Policies\EmployeePolicy::class,
        \App\Models\FileCategory::class => \App\Policies\FileCategoryPolicy::class,
        \App\Models\File::class => \App\Policies\FilePolicy::class,
        \App\Models\Fund::class => \App\Policies\FundPolicy::class,
        \App\Models\Investment::class => \App\Policies\InvestmentPolicy::class,
        \App\Models\News::class => \App\Policies\NewsPolicy::class,
        \App\Models\Note::class => \App\Policies\NotePolicy::class,
        \App\Models\Partner::class => \App\Policies\PartnerPolicy::class,
        \App\Models\Permission::class => \App\Policies\PermissionPolicy::class,
        \App\Models\Protective::class => \App\Policies\ProtectivePolicy::class,
        \App\Models\Bancassurance::class => \App\Policies\BancassurancePolicy::class,
        \App\Models\Reply::class => \App\Policies\ReplyPolicy::class,
        \App\Models\Risk::class => \App\Policies\RiskPolicy::class,
        \App\Models\System::class => \App\Policies\SystemPolicy::class,
        \App\Models\User::class => \App\Policies\UserPolicy::class,
        \App\Models\Post::class => \App\Policies\PostPolicy::class,
        \App\Models\PostCategory::class => \App\Policies\PostCategoryPolicy::class,
        \App\Models\SystemProperty::class => \App\Policies\SystemPropertyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
