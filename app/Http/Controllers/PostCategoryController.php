<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;

use App\Http\Requests\StorePostCategory;
use App\Http\Requests\UpdatePostCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostCategoryController extends Controller
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
        $this->authorize('viewAny', PostCategory::class);

        return view('post-categories.index', [
            'title' => 'Kategorie artykułów',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', PostCategory::class);
        
        return view('post-categories.create', [
            'title' => 'Nowa kategoria artykułów',
            'description' => 'Uzupełnij dane kategorii artykułów i kliknij Zapisz',
            'post_categories' => PostCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostCategory $request)
    {
        $this->authorize('create', PostCategory::class);
        
        $postCategory = new PostCategory($request->all());
        Auth::user()->post_categories()->save($postCategory);

        return redirect()->route('post-categories.show', $postCategory->id)->with('notify_success', 'Nowa kategoria artykułów została dodana!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $postCategory)
    {
        return view('post-categories.show', [
            'title' => 'Szczegóły',
            'post_category' => $postCategory,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $postCategory)
    {
        $this->authorize('update', $postCategory);

        return view('post-categories.edit', [
            'title' => 'Edycja kategorii artykułów',
            'description' => 'Zaktualizuj dane kategorii artykułów i kliknij Zapisz',
            'post_category' => PostCategory::findOrFail($postCategory->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostCategory $request, PostCategory $postCategory)
    {
        $this->authorize('update', $postCategory);
        $postCategory->update($request->all());

        return redirect()->route('post-categories.show', $postCategory->id)->with('notify_success', 'Dane kategrii artykułów zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        $this->authorize('delete', $postCategory);
        $postCategory->delete();

        return redirect()->route('post-categories.index')->with('notify_danger', 'Kategria artykułów usunięta!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $postCategory = PostCategory::withTrashed()->findOrFail($id);

        $this->authorize('restore', $postCategory);
        $postCategory->restore();

        return redirect()->route('post-categories.index')->with('notify_danger', 'Kategoria artykułu został przywrócony!');
    }

    /**
     * Force remove the specified resource from storage.
     *
     * @param  id  $id
     * @return \Illuminate\Http\Response
     */
    public function force_destroy($id)
    {
        $postCategory = PostCategory::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $postCategory);
        $postCategory->forceDelete();

        return redirect()->route('post-categories.index')->with('notify_danger', 'Kategoria artykułów została trwale usunięta!');
    }
}
