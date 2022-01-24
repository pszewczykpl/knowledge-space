<?php

namespace App\Http\Controllers;

use App\Models\FileCategory;
use App\Http\Requests\StoreFileCategory;
use App\Http\Requests\UpdateFileCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class FileCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(FileCategory::class, 'file_category');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('file-categories.index', [
            'title' => 'Kategorie dokumentów',
            'datatables' => FileCategory::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('file-categories.create', [
            'title' => 'Nowa kategoria dokumentów',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFileCategory $request
     * @return RedirectResponse
     */
    public function store(StoreFileCategory $request): RedirectResponse
    {
        $fileCategory = new FileCategory($request->all());
        Auth::user()->fileCategories()->save($fileCategory);

        return redirect()
            ->route('file-categories.show', $fileCategory)
            ->with('notify_success', 'Nowa kategoria dokumentów została dodana!');
    }

    /**
     * Display the specified resource.
     *
     * @param FileCategory $fileCategory
     * @return View
     */
    public function show(FileCategory $fileCategory): View
    {
        return view('file-categories.show', [
            'title' => 'Szczegóły',
            'fileCategory' => $fileCategory,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FileCategory $fileCategory
     * @return View
     */
    public function edit(FileCategory $fileCategory): View
    {
        return view('file-categories.edit', [
            'title' => 'Edycja kategorii dokumentów',
            'fileCategory' => $fileCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFileCategory $request
     * @param FileCategory $fileCategory
     * @return RedirectResponse
     */
    public function update(UpdateFileCategory $request, FileCategory $fileCategory): RedirectResponse
    {
        $fileCategory->update($request->all());

        return redirect()
            ->route('file-categories.show', $fileCategory)
            ->with('notify_success', 'Dane kategrii dokumentów zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FileCategory $fileCategory
     * @return RedirectResponse
     */
    public function destroy(FileCategory $fileCategory): RedirectResponse
    {
        $fileCategory->delete();

        return redirect()
            ->route('file-categories.index')
            ->with('notify_danger', 'Kategria dokumentów usunięta!');
    }
}
