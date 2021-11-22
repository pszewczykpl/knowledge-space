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
            return Cache::tags(['departments'])->rememberForever('departments_' . $id, function () use ($id) {
                return Department::find($id);
            });
        });

        Route::bind('employee', function ($id) {
            return Cache::tags(['employees'])->rememberForever('employees_' . $id, function () use ($id) {
                return Employee::find($id);
            });
        });

        Route::bind('file', function ($id) {
            return Cache::tags(['files'])->rememberForever('files_' . $id, function () use ($id) {
                return File::find($id);
            });
            
        });

        Route::bind('file-category', function ($id) {
            return Cache::tags(['file_categories'])->rememberForever('file_categories_' . $id, function () use ($id) {
                return FileCategory::find($id);
            });
        });

        Route::bind('fund', function ($id) {
            return Cache::tags(['funds'])->rememberForever('funds_' . $id, function () use ($id) {
                return Fund::find($id);
            });
        });

        Route::bind('investment', function ($id) {
            return $this->getCachedEloquent('App\Models\Investment', $id);
        });

        Route::bind('news', function ($id) {
            return Cache::tags(['news'])->rememberForever('news_' . $id, function () use ($id) {
                return News::find($id);
            });
        });

        Route::bind('note', function ($id) {
            return Cache::tags(['notes'])->rememberForever('notes_' . $id, function () use ($id) {
                return Note::find($id);
            });
        });

        Route::bind('partner', function ($id) {
            return Cache::tags(['partners'])->rememberForever('partners_' . $id, function () use ($id) {
                return Partner::find($id);
            });
        });

        Route::bind('permission', function ($id) {
            return Cache::tags(['permissions'])->rememberForever('permissions_' . $id, function () use ($id) {
                return Permission::find($id);
            });
        });

        Route::bind('post', function ($id) {
            return Cache::tags(['posts'])->rememberForever('posts_' . $id, function () use ($id) {
                return Post::find($id);
            });
        });

        Route::bind('post-category', function ($id) {
            return Cache::tags(['post_categories'])->rememberForever('post_categories_' . $id, function () use ($id) {
                return PostCategory::find($id);
            });
        });

        Route::bind('protective', function ($id) {
            return Cache::tags(['protectives'])->rememberForever('protectives_' . $id, function () use ($id) {
                return Protective::find($id);
            });
        });

        Route::bind('reply', function ($id) {
            return Cache::tags(['replies'])->rememberForever('replies_' . $id, function () use ($id) {
                return Reply::find($id);
            });
        });

        Route::bind('risk', function ($id) {
            return Cache::tags(['risks'])->rememberForever('risks_' . $id, function () use ($id) {
                return Risk::find($id);
            });
        });

        Route::bind('system', function ($id) {
            return Cache::tags(['systems'])->rememberForever('systems_' . $id, function () use ($id) {
                return System::find($id);
            });
        });

        Route::bind('user', function ($id) {
            return Cache::tags(['users'])->rememberForever('users_' . $id, function () use ($id) {
                return User::find($id);
            });
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
