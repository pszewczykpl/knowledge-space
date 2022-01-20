<?php

namespace App\Providers;

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
        Route::bind('bancassurance', function ($id) {
            $data = Cache::remember("bancassurances:$id", 60*60*12, function () use ($id) {
                return \App\Models\Bancassurance::withoutEvents(function () use ($id) {
                    return \App\Models\Bancassurance::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\Bancassurance", $data);

            return $data;
        });

        Route::bind('department', function ($id) {
            $data = Cache::remember("departments:$id", 60*60*12, function () use ($id) {
                return \App\Models\Department::withoutEvents(function () use ($id) {
                    return \App\Models\Department::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\Department", $data);

            return $data;
        });

        Route::bind('employee', function ($id) {
            $data = Cache::remember("employees:$id", 60*60*12, function () use ($id) {
                return \App\Models\Employee::withoutEvents(function () use ($id) {
                    return \App\Models\Employee::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\Employee", $data);

            return $data;
        });

        Route::bind('file', function ($id) {
            $data = Cache::remember("files:$id", 60*60*12, function () use ($id) {
                return \App\Models\File::withoutEvents(function () use ($id) {
                    return \App\Models\File::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\File", $data);

            return $data;
        });

        Route::bind('file-category', function ($id) {
            $data = Cache::remember("file_categories:$id", 60*60*12, function () use ($id) {
                return \App\Models\FileCategory::withoutEvents(function () use ($id) {
                    return \App\Models\FileCategory::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\FileCategory", $data);

            return $data;
        });

        Route::bind('fund', function ($id) {
            $data = Cache::remember("funds:$id", 60*60*12, function () use ($id) {
                return \App\Models\Fund::withoutEvents(function () use ($id) {
                    return \App\Models\Fund::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\Fund", $data);

            return $data;
        });

        Route::bind('investment', function ($id) {
            $data = Cache::remember("investments:$id", 60*60*12, function () use ($id) {
                return \App\Models\Investment::withoutEvents(function () use ($id) {
                    return \App\Models\Investment::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\Investment", $data);

            return $data;
        });

        Route::bind('news', function ($id) {
            $data = Cache::remember("news:$id", 60*60*12, function () use ($id) {
                return \App\Models\News::withoutEvents(function () use ($id) {
                    return \App\Models\News::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\News", $data);

            return $data;
        });

        Route::bind('note', function ($id) {
            $data = Cache::remember("notes:$id", 60*60*12, function () use ($id) {
                return \App\Models\Note::withoutEvents(function () use ($id) {
                    return \App\Models\Note::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\Note", $data);

            return $data;
        });

        Route::bind('partner', function ($id) {
            $data = Cache::remember("partners:$id", 60*60*12, function () use ($id) {
                return \App\Models\Partner::withoutEvents(function () use ($id) {
                    return \App\Models\Partner::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\Partner", $data);

            return $data;
        });

        Route::bind('permission', function ($id) {
            $data = Cache::remember("permissions:$id", 60*60*12, function () use ($id) {
                return \App\Models\Permission::withoutEvents(function () use ($id) {
                    return \App\Models\Permission::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\Permission", $data);

            return $data;
        });

        Route::bind('post', function ($id) {
            $data = Cache::remember("posts:$id", 60*60*12, function () use ($id) {
                return \App\Models\Post::withoutEvents(function () use ($id) {
                    return \App\Models\Post::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\Post", $data);

            return $data;
        });

        Route::bind('post-category', function ($id) {
            $data = Cache::remember("post_categories:$id", 60*60*12, function () use ($id) {
                return \App\Models\PostCategory::withoutEvents(function () use ($id) {
                    return \App\Models\PostCategory::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\PostCategory", $data);

            return $data;
        });

        Route::bind('protective', function ($id) {
            $data = Cache::remember("protectives:$id", 60*60*12, function () use ($id) {
                return \App\Models\Protective::withoutEvents(function () use ($id) {
                    return \App\Models\Protective::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\Protective", $data);

            return $data;
        });

        Route::bind('reply', function ($id) {
            $data = Cache::remember("replies:$id", 60*60*12, function () use ($id) {
                return \App\Models\Reply::withoutEvents(function () use ($id) {
                    return \App\Models\Reply::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\Reply", $data);

            return $data;
        });

        Route::bind('risk', function ($id) {
            $data = Cache::remember("risks:$id", 60*60*12, function () use ($id) {
                return \App\Models\Risk::withoutEvents(function () use ($id) {
                    return \App\Models\Risk::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\Risk", $data);

            return $data;
        });

        Route::bind('system', function ($id) {
            $data = Cache::remember("systems:$id", 60*60*12, function () use ($id) {
                return \App\Models\System::withoutEvents(function () use ($id) {
                    return \App\Models\System::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\System", $data);

            return $data;
        });

        Route::bind('user', function ($id) {
            $data = Cache::remember("users:$id", 60*60*12, function () use ($id) {
                return \App\Models\User::withoutEvents(function () use ($id) {
                    return \App\Models\User::find($id);
                });
            });
            event("eloquent.retrieved: \App\Models\User", $data);

            return $data;
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
