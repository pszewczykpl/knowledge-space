<?php

namespace App\Providers;

use App\Repositories\DataTable\DataTable;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Force HTTPS in production.
         */
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        /**
         * Bind DataTable to the container.
         */
        $this->app->bind('datatable',function(){
            return new DataTable();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
