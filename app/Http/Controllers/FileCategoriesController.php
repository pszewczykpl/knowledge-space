<?php

namespace App\Http\Controllers;

use App\FileCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FileCategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
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
            'fileCategories' => FileCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Note::class);
        
        return view('file-categories.create', [
            'title' => 'Nowa notatka',
            'description' => 'Uzupełnij dane notatki i kliknij Zapisz',
            'file-categories' => FileCategory::all()
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
        $this->authorize('create', Note::class);
        
        $fileCategory = new Note($request->all());
        Auth::user()->notes()->save($fileCategory);

        return redirect()->back()->with('notify_success', 'Nowa notatka została dodana!');
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
            'file-category' => $fileCategory,
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
            'title' => 'Edycja notatki',
            'description' => 'Zaktualizuj dane notatki i kliknij Zapisz',
            'file-category' => $fileCategory,
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

        return redirect()->route('notes.show', $fileCategory->id)->with('notify_success', 'Dane notatki zostały zaktualizowane!');
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

        return redirect()->route('notes.index')->with('notify_danger', 'Notatka została usunięta!');
    }
}
