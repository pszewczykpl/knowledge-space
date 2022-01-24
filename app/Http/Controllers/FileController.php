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
use Illuminate\Database\Eloquent\Model;
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
        $this->authorizeResource(File::class, 'file');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
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
     * @param Request $request
     * @return View
     */
    public function create(Request $request): View
    {
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
     */
    public function store(StoreFile $request): RedirectResponse
    {
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
        $file->draft = $request->boolean('draft_checkbox');
        $file->fileCategory()->associate($request->file_category_id);
        Auth::user()->files()->save($file);
        
        $file->investments()->attach($request->investment_id);
        $file->protectives()->attach($request->protective_id);
        $file->employees()->attach($request->employee_id);

        return redirect()
            ->route('files.index')
            ->with('notify_success', 'Nowy dokument został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param File $file
     * @return RedirectResponse|StreamedResponse
     */
    public function show(File $file): StreamedResponse|RedirectResponse
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
        
        return redirect()
            ->route('files.download', $file);
    }

    /**
     * Download the specified resource.
     *
     * @param File $file
     * @return StreamedResponse
     */
    public function download(File $file): StreamedResponse
    {
        return Storage::download($file->path, $file->name . '.' . $file->extension);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param File $file
     * @return View
     */
    public function edit(File $file): View
    {
        return view('files.edit', [
            'title' => 'Edycja dokumentu',
            'file' => $file,
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
     */
    public function update(UpdateFile $request, File $file): RedirectResponse
    {
        $file->update($request->all());
        $file->draft = $request->boolean('draft_checkbox');
        $file->fileCategory()->associate($request->input('file_category_id'));

        if ($request->hasFile('file')) {
            $path = $request->file->store('files');
            $file->path = $path;
            $file->extension = $request->file('file')->extension();
        }
        $file->save();

        $file->investments()->sync($request->investment_id);
        $file->protectives()->sync($request->protective_id);
        $file->employees()->sync($request->employee_id);

        return redirect()
            ->route('files.index')
            ->with('notify_success', 'Dokument został zaktualizowany!');
    }

    /**
     * Replicate the specified resource from storage.
     *
     * @param File $file
     * @param string $fileable_type
     * @param string $fileable_id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function replace(File $file, string $fileable_type, string $fileable_id): RedirectResponse
    {
        $this->authorize('update', $file);

        $file->{$fileable_type}()->detach($fileable_id);
        $file->save(); // Don't needed it, but must run update/updating event for flush cache

        $newFile = $file->replicate();
        $newFile->save();
        $newFile->{$fileable_type}()->attach($fileable_id);

        return redirect()
            ->route('files.edit', $newFile)
            ->with('notify_success', 'Dokument został zastąpiony!');
    }

    /**
     * Detach the specified resource from storage.
     *
     * @param File $file
     * @param string $fileable_type
     * @param string $fileable_id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function detach(File $file, string $fileable_type, string $fileable_id): RedirectResponse
    {
        $this->authorize('update', $file);
        
        $file->{$fileable_type}()->detach($fileable_id);
        $file->save(); // Don't needed it, but must run update/updating event for flush cache

        return redirect()
            ->back()
            ->with('notify_danger', 'Dokument został odpięty od produktu!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param File $file
     * @return RedirectResponse
     */
    public function destroy(File $file): RedirectResponse
    {
        if($file->path !== 'files/deleted.pdf') {
            Storage::move($file->path, 'trash/' . $file->path);
        }
        $file->delete();

        return redirect()
            ->back()
            ->with('notify_danger', 'Dokument został usunięty!');
    }
}
