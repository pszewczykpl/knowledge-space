<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Replies;

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
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewany', News::class);

        return view('news.index', [
            'title' => 'Aktualności',
            'news' => News::withTrashed(Auth::user()->hasPermission('view-deleted') ?? false)->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', News::class);

        return view('news.create', [
            'title' => 'Nowa aktualność',
            'description' => 'Uzupełnij dane aktualności i kliknij Zapisz',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNews $request)
    {
        $this->authorize('create', News::class);

        $news = new News($request->all());
        Auth::user()->news()->save($news);

        return redirect()->back()->with('notify_success', 'Nowa aktualność została dodana!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $this->authorize('view', $news);

        return view('news.show', [
            'title' => 'Aktualność',
            'news' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $this->authorize('update', $news);

        return view('news.edit', [
            'title' => 'Edycja aktualności',
            'description' => 'Zaktualizuj dane aktualności i kliknij Zapisz',
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNews $request, News $news)
    {
        $this->authorize('update', $news);
        $news->update($request->all());

        return redirect()->route('news.show', $news->id)->with('notify_success', 'Dane aktualności zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $this->authorize('delete', $news);
        $news->delete();
        $news->replies()->delete();

        return redirect()->route('news.index')->with('notify_danger', 'Aktualność została usunięta!');
    }
    
    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $news = News::withTrashed()->findOrFail($id);

        $this->authorize('restore', $news);
        
        $news->restore();
        $news->replies()->withTrashed()->restore();

        return redirect()->route('news.index')->with('notify_danger', 'Aktualność została przywrócona!');
    }

    /**
     * Force remove the specified resource from storage.
     *
     * @param  \App\  $id
     * @return \Illuminate\Http\Response
     */
    public function force_destroy($id)
    {
        $news = News::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $news);
        
        $news->forceDelete();
        $news->replies()->withTrashed()->forceDelete();

        return redirect()->route('news.index')->with('notify_danger', 'Aktualność została trwale usunięta!');
    }
}
