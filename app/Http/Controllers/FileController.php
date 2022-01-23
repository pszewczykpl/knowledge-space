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

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'download']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('files.index', [
            'title' => 'Dokumenty',
            'datatables' => File::getDatatablesData(),
            'fileCategories' => FileCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
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
            'fileCategories' => FileCategory::all(),
            'fileable_type' => $request->fileable_type ?? null,
            'fileable_id' => $request->fileable_id ?? null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFile $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(StoreFile $request)
    {
        $this->authorize('create', File::class);

        $file = new File($request->all());

        if ($request->hasFile('file')) {
            $path = $request->file->store('files');
            $file->path = $path;
            $file->extension = $request->file('file')->extension();
        }
        else {
            $file->path = 'files/deleted.pdf';
            $file->extension = 'pdf';
        }
        
        if(($request->draft_checkbox ?? null)) {
            $file->draft = 1;
        } else {
            $file->draft = 0;
        }

        $file->fileCategory()->associate($request->file_category_id);
        Auth::user()->files()->save($file);
        
        $file->investments()->attach($request->investment_id);
        $file->protectives()->attach($request->protective_id);
        $file->employees()->attach($request->employee_id);

        return redirect()->route('files.index')->with('notify_success', 'Nowy dokument został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param File $file
     * @return RedirectResponse|StreamedResponse
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
     * @param File $file
     * @return StreamedResponse
     */
    public function download(File $file) 
    {
        return Storage::download($file->path, $file->name . '.' . $file->extension);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param File $file
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(File $file)
    {
        $this->authorize('update', $file);

        return view('files.edit', [
            'title' => 'Edycja dokumentu',
            'description' => 'Zaktualizuj dane dokumentu i kliknij Zapisz',
            'file' => File::findOrFail($file->id),
            'investments' => Investment::all(),
            'protectives' => Protective::all(),
            'bancassurances' => Bancassurance::all(),
            'employees' => Employee::all(),
            'fileCategories' => FileCategory::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFile $request
     * @param File $file
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(UpdateFile $request, File $file)
    {
        $this->authorize('update', $file);

        $file->update($request->all());
        
        $file->fileCategory()->associate($request->input('file_category_id'));
        $file->draft = ($request->input('draft_checkbox') ?? null) ? 1 : 0;

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
     * @return RedirectResponse
     */
    public function replace(File $file, $fileable_type, $fileable_id)
    {
        $this->authorize('update', $file);
        
        $file->{$fileable_type}()->detach($fileable_id);
        $file->save(); // Don't needed it, but must run update/updating event for flush cache

        $file->load('user');
        $clone = $file->replicate();
        $clone->save();
        $clone->{$fileable_type}()->attach($fileable_id);

        return redirect()->route('files.edit', $clone)->with('notify_success', 'Dokument został zastąpiony!');
    }

    /**
     * Detach the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return RedirectResponse
     */
    public function detach(File $file, $fileable_type, $fileable_id)
    {
        $this->authorize('update', $file);
        
        $file->{$fileable_type}()->detach($fileable_id);
        $file->save(); // Don't needed it, but must run update/updating event for flush cache

        return redirect()->back()->with('notify_danger', 'Dokument został odpięty od produktu!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param File $file
     * @return RedirectResponse
     */
    public function destroy(File $file)
    {
        $this->authorize('delete', $file);

        if($file->path !== 'files/deleted.pdf') {
            Storage::move($file->path, 'trash/' . $file->path);
        }
        $file->delete();

        return redirect()->back()->with('notify_danger', 'Dokument został usunięty!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function restore(int $id)
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
     * @param int $id
     * @return RedirectResponse
     */
    public function force_destroy(int $id)
    {
        $file = File::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $file);
        $file->forceDelete();

        return redirect()->route('files.index')->with('notify_danger', 'Dokument został trwale usunięty!');
    }
}
