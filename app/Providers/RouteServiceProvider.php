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
use App\Traits\CacheModels;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    use CacheModels;
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = '';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Bind resources for cache using rememberForever
         */
        Route::bind('bancassurance', function ($id) {
            return $this->getCachedEloquent('App\Models\Bancassurance', $id);
        });

        Route::bind('department', function ($id) {
            return $this->getCachedEloquent('App\Models\Department', $id);
        });

        Route::bind('employee', function ($id) {
            return $this->getCachedEloquent('App\Models\Employee', $id);
        });

        Route::bind('file', function ($id) {
            return $this->getCachedEloquent('App\Models\File', $id);
        });

        Route::bind('file-category', function ($id) {
            return $this->getCachedEloquent('App\Models\FileCategory', $id);
        });

        Route::bind('fund', function ($id) {
            return $this->getCachedEloquent('App\Models\Fund', $id);
        });

        Route::bind('investment', function ($id) {
            return $this->getCachedEloquent('App\Models\Investment', $id);
        });

        Route::bind('news', function ($id) {
            return $this->getCachedEloquent('App\Models\News', $id);
        });

        Route::bind('note', function ($id) {
            return $this->getCachedEloquent('App\Models\Note', $id);
        });

        Route::bind('partner', function ($id) {
            return $this->getCachedEloquent('App\Models\Partner', $id);
        });

        Route::bind('permission', function ($id) {
            return $this->getCachedEloquent('App\Models\Permission', $id);
        });

        Route::bind('post', function ($id) {
            return $this->getCachedEloquent('App\Models\Post', $id);
        });

        Route::bind('post-category', function ($id) {
            return $this->getCachedEloquent('App\Models\PostCategory', $id);
        });

        Route::bind('protective', function ($id) {
            return $this->getCachedEloquent('App\Models\Protective', $id);
        });

        Route::bind('reply', function ($id) {
            return $this->getCachedEloquent('App\Models\Reply', $id);
        });

        Route::bind('risk', function ($id) {
            return $this->getCachedEloquent('App\Models\Risk', $id);
        });

        Route::bind('system', function ($id) {
            return $this->getCachedEloquent('App\Models\System', $id);
        });

        Route::bind('user', function ($id) {
            return $this->getCachedEloquent('App\Models\User', $id);
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
