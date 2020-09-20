<?php

namespace App\Http\Controllers;

use App\File;
use App\Investment;
use App\Protective;
use App\Employee;
use App\FileCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'download']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewany', File::class);

        return view('files.index', [
            'title' => 'Dokumenty',
            'files' => File::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', File::class);
        
        return view('files.create', [
            'title' => 'Nowy dokument',
            'description' => 'Uzupełnij dane dokumentu i kliknij Zapisz',
            'investments' => Investment::all(),
            'protectives' => Protective::all(),
            'employees' => Employee::all(),
            'file_categories' => FileCategory::all(),
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
        $this->authorize('create', File::class);

        $path = $request->file->store(date('Y') . '/' . date('m') . '/' . date('d'));

        $file = new File($request->all());
        $file->path = $path;
        $file->extension = $request->file('file')->extension();
        $file->file_category()->associate(FileCategory::find($request->file_category_id));
        Auth::user()->files()->save($file);

        $file->investments()->sync($request->investment_id);
        $file->protectives()->sync($request->protective_id);
        $file->employees()->sync($request->employee_id);

        return redirect()->route('files.index')->with('notify_success', 'Nowy dokument został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        if($file->extension == 'pdf') {
            return Storage::download(
                $file->path, 
                $file->name . '.' . $file->extension, 
                [
                    'Content-type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="'. $file->name . '.' . $file->extension .'"',
                    'Content-Transfer-Encoding' => 'binary',
                    'Accept-Ranges' => 'bytes'
                ]
            );
        }
        
        return redirect()->route('files.download', $file->id);
    }

    /**
     * Download the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function download($id) 
    {
        $file = File::findOrFail($id);

        return Storage::download($file->path, $file->name . '.' . $file->extension);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        $this->authorize('update', $file);

        return view('files.edit', [
            'title' => 'Edycja dokumentu',
            'description' => 'Zaktualizuj dane dokumentu i kliknij Zapisz',
            'file' => $file,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $this->authorize('update', $file);
        $file->update($request->all());

        return redirect()->route('files.index')->with('notify_success', 'Dokument został zaktualizowany!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $this->authorize('delete', $file);
        $file->delete();

        return redirect()->back()->with('notify_danger', 'Dokument został usunięty!');
    }
}
