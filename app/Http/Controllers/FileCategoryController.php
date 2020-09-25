<?php

namespace App\Http\Controllers;

use App\Models\FileCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', FileCategory::class);

        return view('file-categories.index', [
            'title' => 'Kategorie dokumentów',
            'file_categories' => FileCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', FileCategory::class);
        
        return view('file-categories.create', [
            'title' => 'Nowa kategoria dokumentów',
            'description' => 'Uzupełnij dane kategorii dokumentów i kliknij Zapisz',
            'file_categories' => FileCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', FileCategory::class);
        
        $fileCategory = new FileCategory($request->all());
        Auth::user()->file_categories()->save($fileCategory);

        return redirect()->route('file-categories.show', $fileCategory->id)->with('notify_success', 'Nowa kategoria dokumentów została dodana!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FileCategory  $fileCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FileCategory $fileCategory)
    {
        return view('file-categories.show', [
            'title' => 'Szczegóły',
            'file_category' => $fileCategory,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FileCategory  $fileCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FileCategory $fileCategory)
    {
        $this->authorize('update', $fileCategory);

        return view('file-categories.edit', [
            'title' => 'Edycja kategorii dokumentów',
            'description' => 'Zaktualizuj dane kategorii dokumentów i kliknij Zapisz',
            'file_category' => $fileCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FileCategory  $fileCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileCategory $fileCategory)
    {
        $this->authorize('update', $fileCategory);
        $fileCategory->update($request->all());

        return redirect()->route('file-categories.show', $fileCategory->id)->with('notify_success', 'Dane kategrii dokumentów zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FileCategory  $fileCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileCategory $fileCategory)
    {
        $this->authorize('delete', $fileCategory);
        $fileCategory->delete();

        return redirect()->route('file-categories.index')->with('notify_danger', 'Kategria dokumentów usunięta!');
    }
}
