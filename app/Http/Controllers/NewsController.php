<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\News;
use App\Http\Requests\StoreNews;
use App\Http\Requests\UpdateNews;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(News::class, 'news');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $news = News::with(['user', 'replies'])->orderBy('created_at', 'desc');

        return view('news.index', [
            'title' => 'Aktualności',
            'news' => $news->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('news.create', [
            'title' => 'Nowa aktualność',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNews $request
     * @return RedirectResponse
     */
    public function store(StoreNews $request): RedirectResponse
    {
        $news = new News($request->all());
        Auth::user()->news()->save($news);

        return redirect()
            ->back()
            ->with('notify_success', 'Nowa aktualność została dodana!');
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View
     */
    public function show(News $news): View|Factory|Application
    {
        return view('news.show', [
            'title' => 'Aktualność',
            'news' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View
     */
    public function edit(News $news): View|Factory|Application
    {
        return view('news.edit', [
            'title' => 'Edycja aktualności',
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNews $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(UpdateNews $request, News $news): RedirectResponse
    {
        $news->update($request->all());

        return redirect()
            ->route('news.show', $news)
            ->with('notify_success', 'Dane aktualności zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return RedirectResponse
     */
    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        return redirect()
            ->route('news.index')
            ->with('notify_danger', 'Aktualność została usunięta!');
    }
}
