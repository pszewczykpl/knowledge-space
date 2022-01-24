<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use App\Http\Requests\StorePostCategory;
use App\Http\Requests\UpdatePostCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
        $this->authorizeResource(PostCategory::class, 'post_category');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('post-categories.index', [
            'title' => 'Kategorie artykułów',
            'datatables' => PostCategory::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('post-categories.create', [
            'title' => 'Nowa kategoria artykułów',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostCategory $request
     * @return RedirectResponse
     */
    public function store(StorePostCategory $request): RedirectResponse
    {
        $postCategory = new PostCategory($request->all());
        Auth::user()->postCategories()->save($postCategory);

        return redirect()
            ->route('post-categories.show', $postCategory)
            ->with('notify_success', 'Nowa kategoria artykułów została dodana!');
    }

    /**
     * Display the specified resource.
     *
     * @param PostCategory $postCategory
     * @return Application|Factory|View
     */
    public function show(PostCategory $postCategory): View|Factory|Application
    {
        return view('post-categories.show', [
            'title' => 'Szczegóły',
            'postCategory' => $postCategory,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PostCategory $postCategory
     * @return Application|Factory|View
     */
    public function edit(PostCategory $postCategory): View|Factory|Application
    {
        return view('post-categories.edit', [
            'title' => 'Edycja kategorii artykułów',
            'postCategory' => $postCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostCategory $request
     * @param PostCategory $postCategory
     * @return RedirectResponse
     */
    public function update(UpdatePostCategory $request, PostCategory $postCategory): RedirectResponse
    {
        $postCategory->update($request->all());

        return redirect()
            ->route('post-categories.show', $postCategory)
            ->with('notify_success', 'Dane kategrii artykułów zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PostCategory $postCategory
     * @return RedirectResponse
     */
    public function destroy(PostCategory $postCategory): RedirectResponse
    {
        $postCategory->delete();

        return redirect()
            ->route('post-categories.index')
            ->with('notify_danger', 'Kategria artykułów usunięta!');
    }
}
