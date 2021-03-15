<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Department::class => DepartmentPolicy::class,
        Employee::class => EmployeePolicy::class,
        FileCategory::class => FileCategoryPolicy::class,
        File::class => FilePolicy::class,
        Fund::class => FundPolicy::class,
        Investment::class => InvestmentPolicy::class,
        News::class => NewsPolicy::class,
        Note::class => NotePolicy::class,
        Partner::class => PartnerPolicy::class,
        Permission::class => PermissionPolicy::class,
        Protective::class => ProtectivePolicy::class,
        Banassurance::class => BanassurancePolicy::class,
        Reply::class => ReplyPolicy::class,
        Risk::class => RiskPolicy::class,
        System::class => SystemPolicy::class,
        Trash::class => TrashPolicy::class,
        User::class => UserPolicy::class,
        Post::class => PostPolicy::class,
        PostCategory::class => PostCategoryPolicy::class,
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
