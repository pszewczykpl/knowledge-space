<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Investment;
use App\Models\Protective;
use App\Models\Bancassurance;
use App\Models\Employee;
use App\Models\FileCategory;

use App\Http\Requests\StoreFile;
use App\Http\Requests\UpdateFile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
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
     * @return View
     */
    public function create(Request $request)
    {
        $this->authorize('create', File::class);
        
        return view('files.create', [
            'title' => 'Nowy dokument',
            'description' => 'Uzupełnij dane dokumentu i kliknij Zapisz',
            'investments' => Investment::all(),
            'protectives' => Protective::all(),
            'bancassurances' => Bancassurance::all(),
            'employees' => Employee::all(),
            'file_categories' => FileCategory::all(),
            'fileable_type' => $request->fileable_type ?? null,
            'fileable_id' => $request->fileable_id ?? null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile $request)
    {
        $this->authorize('create', File::class);

        $path = $request->file->store('files');

        $file = new File($request->all());
        if(($request->draft_checkbox ?? null)) {
            $file->draft = 1;
        } else {
            $file->draft = 0;
        }

        $file->path = $path;
        $file->extension = $request->file('file')->extension();
        $file->file_category()->associate($request->file_category_id);
        Auth::user()->files()->save($file);
        
        $file->investments()->attach($request->investment_id);
        $file->protectives()->attach($request->protective_id);
        $file->employees()->attach($request->employee_id);

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
    public function download(File $file) 
    {
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
            'investments' => Investment::all(),
            'protectives' => Protective::all(),
            'bancassurances' => Bancassurance::all(),
            'employees' => Employee::all(),
            'file_categories' => FileCategory::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFile $request, File $file)
    {
        $this->authorize('update', $file);

        $file->update($request->all());
        
        $file->file_category()->associate($request->file_category_id);
        if(($request->draft_checkbox ?? null)) {
            $file->draft = 1;
        } else {
            $file->draft = 0;
        }

        if ($request->hasFile('file')) {
            $path = $request->file->store('files');
            $file->path = $path;
            $file->extension = $request->file('file')->extension();
        }
        $file->save();

        $file->investments()->sync($request->investment_id);
        $file->protectives()->sync($request->protective_id);
        $file->employees()->sync($request->employee_id);

        return redirect()->route('files.index')->with('notify_success', 'Dokument został zaktualizowany!');
    }

    /**
     * Replicate the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function replace(File $file, $fileable_type, $fileable_id)
    {
        $this->authorize('update', $file);
        
        $file->{$fileable_type . 's'}()->detach($fileable_id);

        $file->load('user');
        $clone = $file->replicate();
        $clone->save();
        $clone->{$fileable_type . 's'}()->attach($fileable_id);

        return redirect()->route('files.edit', $clone)->with('notify_success', 'Dokument został zastąpiony!');
    }

    /**
     * Detach the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function detach(File $file, $fileable_type, $fileable_id)
    {
        $this->authorize('update', $file);
        
        $file->{$fileable_type . 's'}()->detach($fileable_id);

        return redirect()->back()->with('notify_danger', 'Dokument został odpięty od produktu!');
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

        Storage::move($file->path, 'trash/' . $file->path);
        $file->delete();

        return redirect()->back()->with('notify_danger', 'Dokument został usunięty!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $file = File::withTrashed()->findOrFail($id);

        $this->authorize('restore', $file);

        Storage::move('trash/' . $file->path, $file->path);
        $file->restore();

        return redirect()->route('files.index')->with('notify_danger', 'Dokument został przywrócony!');
    }

    /**
     * Force remove the specified resource from storage.
     *
     * @param  id  $id
     * @return \Illuminate\Http\Response
     */
    public function force_destroy($id)
    {
        $file = File::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $file);
        $file->forceDelete();

        return redirect()->route('files.index')->with('notify_danger', 'Dokument został trwale usunięty!');
    }
}
