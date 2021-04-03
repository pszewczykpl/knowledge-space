<?php

namespace App\Providers;

use App\Models\Attachment;
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
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
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
        Route::bind('attachment', function ($value) {
            return Cache::rememberForever('attachments_' . $value, function () use ($value) {
                return Attachment::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('bancassurance', function ($value) {
            return Cache::rememberForever('bancassurances_' . $value, function () use ($value) {
                return Bancassurance::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('department', function ($value) {
            return Cache::rememberForever('departments_' . $value, function () use ($value) {
                return Department::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('employee', function ($value) {
            return Cache::rememberForever('employees_' . $value, function () use ($value) {
                return Employee::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('file', function ($value) {
            return Cache::rememberForever('files_' . $value, function () use ($value) {
                return File::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('file-category', function ($value) {
            return Cache::rememberForever('file_categories_' . $value, function () use ($value) {
                return FileCategory::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('fund', function ($value) {
            return Cache::rememberForever('funds_' . $value, function () use ($value) {
                return Fund::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('investment', function ($value) {
            return Cache::rememberForever('investments_' . $value, function () use ($value) {
                return Investment::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('news', function ($value) {
            return Cache::rememberForever('news_' . $value, function () use ($value) {
                return News::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('note', function ($value) {
            return Cache::rememberForever('notes_' . $value, function () use ($value) {
                return Note::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('partner', function ($value) {
            return Cache::rememberForever('partners_' . $value, function () use ($value) {
                return Partner::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('permission', function ($value) {
            return Cache::rememberForever('permissions_' . $value, function () use ($value) {
                return Permission::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('post', function ($value) {
            return Cache::rememberForever('posts_' . $value, function () use ($value) {
                return Post::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('post-category', function ($value) {
            return Cache::rememberForever('post_categories_' . $value, function () use ($value) {
                return PostCategory::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('protective', function ($value) {
            return Cache::rememberForever('protectives_' . $value, function () use ($value) {
                return Protective::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('reply', function ($value) {
            return Cache::rememberForever('replies_' . $value, function () use ($value) {
                return Reply::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('risk', function ($value) {
            return Cache::rememberForever('risks_' . $value, function () use ($value) {
                return Risk::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('system', function ($value) {
            return Cache::rememberForever('systems_' . $value, function () use ($value) {
                return System::where('id', $value)->firstOrFail();
            });
        });

        Route::bind('user', function ($value) {
            return Cache::rememberForever('users_' . $value, function () use ($value) {
                return User::where('id', $value)->firstOrFail();
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
