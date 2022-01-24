<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use App\Models\System;
use App\Models\News;
use App\Models\Post;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $systems = Cache::tags(['systems'])->rememberForever('systems_all', function () {
            return System::all();
        });

        return view('home.index', [
            'title' => 'Strona główna',
            'systems' => $systems,
            'news' => News::orderBy('id', 'desc')->take(5)->get(),
            'name' => config('app.name'),
            'post' => Post::orderBy('id', 'desc')->take(3)->get(),
        ]);
    }
}
