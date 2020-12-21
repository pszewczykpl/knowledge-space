<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if(($request->category ?? null) === null) {
            $posts = Post::withTrashed($user ? $user->hasPermission('view-deleted') : false)->orderBy('created_at', 'desc')->paginate(10);
        }
        else {
            $posts = Post::withTrashed($user ? $user->hasPermission('view-deleted') : false)->where('post_category_id', $request->category)->orderBy('created_at', 'desc')->paginate(10);
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        return view('posts.create', [
            'title' => 'Nowy Artykuł',
            'description' => 'Uzupełnij dane artykułu i kliknij Zapisz',
            'postCategories' => PostCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StorePost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $this->authorize('create', Post::class);

        $post = new Post($request->all());
        $post->post_category()->associate($request->post_category_id);
        Auth::user()->posts()->save($post);

        return redirect()->route('posts.index')->with('notify_success', 'Nowy artykuł został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'title' => 'Artykuł',
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', [
            'title' => 'Edycja artykułu',
            'description' => 'Zaktualizuj dane artykułu i kliknij Zapisz',
            'postCategories' => PostCategory::all(),
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdatePost  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, Post $post)
    {
        $this->authorize('update', $post);
        $post->update($request->all());
        $post->post_category()->associate($request->post_category_id);

        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('attachments');

            $attachment = new Attachment();
            $attachment->path = $path;
            $attachment->name = $request->file('attachment')->getClientOriginalName();
            $attachment->extension = $request->file('attachment')->extension();
            $attachment->attachmentable()->associate($post);
            Auth::user()->posts()->save($attachment);
        }
        $post->save();

        return redirect()->route('posts.show', $post->id)->with('notify_success', 'Dane artykułu zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index')->with('notify_danger', 'Artykuł został usunięty!');
    }
    
    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        $this->authorize('restore', $post);
        $post->restore();

        return redirect()->route('posts.index')->with('notify_danger', 'Artykuł został przywrócony!');
    }

    /**
     * Force remove the specified resource from storage.
     *
     * @param  \App\  $id
     * @return \Illuminate\Http\Response
     */
    public function force_destroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $post);
        $post->forceDelete();

        return redirect()->route('posts.index')->with('notify_danger', 'Artykuł został trwale usunięty!');
    }
}
