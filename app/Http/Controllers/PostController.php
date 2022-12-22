<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Attachment;

use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        // If category is not set, show all posts. If category is set, show posts from that category.
        if(($request->category ?? null) === null) {
            $posts = Post::orderBy('created_at', 'desc')->paginate(8);
        } else {
            $posts = Post::where('post_category_id', $request->category)->orderBy('created_at', 'desc')->paginate(8);
        }

        return view('posts.index', [
            'title' => 'Artykuły',
            'posts' => $posts,
            'postCategories' => PostCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('posts.create', [
            'title' => 'Nowy Artykuł',
            'postCategories' => PostCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePost $request
     * @return RedirectResponse
     */
    public function store(StorePost $request): RedirectResponse
    {
        $post = new Post($request->all());

        $post->postCategory()->associate($request->post_category_id);
        Auth::user()->posts()->save($post);

        return redirect()
            ->route('posts.index')
            ->with('notify_success', 'Nowy artykuł został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post): View|Factory|Application
    {
        return view('posts.show', [
            'title' => 'Artykuł',
            'post' => $post,
            'postCategories' => PostCategory::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post): View|Factory|Application
    {
        return view('posts.edit', [
            'title' => 'Edycja artykułu',
            'postCategories' => PostCategory::all(),
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePost $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(UpdatePost $request, Post $post): RedirectResponse
    {
        $post->update($request->all());
        
        $post->postCategory()->associate($request->post_category_id);
        $post->save();

        return redirect()
            ->route('posts.show', $post)
            ->with('notify_success', 'Dane artykułu zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('notify_danger', 'Artykuł został usunięty!');
    }
}
