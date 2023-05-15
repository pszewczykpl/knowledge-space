<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Http\Resources\FileCollection;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return FileResource::collection(File::NotProduct()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFileRequest  $request
     * @return JsonResponse
     */
    public function store(StoreFileRequest $request)
    {
        $file = new File($request->all());

        if ($request->hasFile('file')) {
            $file->path = $request->file->store('files');
            $file->extension = $request->file('file')->extension();
        }
        auth()->user()->files()->save($file);

        $file->products()->attach($request->input('product_id'));

        return response()->json([
            'message' => 'Successfully created.',
            'data' => new FileResource($file),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  File  $file
     * @return BinaryFileResponse
     */
    public function show(File $file)
    {
        $path = Storage::path($file->path);

        if (!Storage::exists($file->path)) {
            $path = Storage::path('files/deleted.pdf');
        }

        return response()->file($path, ['Content-Type' => 'application/pdf']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFileRequest  $request
     * @param  File  $file
     * @return JsonResponse
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        $file->update($request->all());

        if ($request->hasFile('file')) {
            $path = $request->file->store('files');
            $file->path = $path;
            $file->extension = $request->file('file')->extension();
        }
        $file->save();

        $file->products()->sync($request->product_id);

        return response()->json([
            'message' => 'Successfully updated.',
            'data' => new FileResource($file),
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  File  $file
     * @return JsonResponse
     */
    public function destroy(File $file)
    {
        $file->delete();

        return response()->json([
            'message' => 'Successfully deleted.',
        ], Response::HTTP_OK);
    }
}
