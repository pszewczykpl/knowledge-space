<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
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
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('store', 'update', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return FileResource::collection(File::notProduct()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFileRequest  $request
     * @return JsonResponse
     */
    public function store(StoreFileRequest $request): JsonResponse
    {
        $file = new File($request->validated());
        $file->path = $request->file('file')->store('files');
        $file->extension = $request->file('file')->extension();
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
     * @return FileResource
     */
    public function show(File $file): FileResource
    {
        return new FileResource($file);
    }

    /**
     * Display the specified resource.
     *
     * @param  File  $file
     * @return BinaryFileResponse
     */
    public function open(File $file): BinaryFileResponse
    {
        return response()->file(
            Storage::path($file->path)
        );
    }

    /**
     * Download file from local storage.
     *
     * @param  File  $file
     * @return BinaryFileResponse
     */
    public function download(File $file): BinaryFileResponse
    {
        return response()->download(
            Storage::path($file->path)
        );
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
        /*
         * Update the file.
         */
        $file->update($request->validated());

        /*
         * If the request has a file, update the file.
         */
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('files');
            $file->path = $path;
            $file->extension = $request->file('file')->extension();
        }
        $file->save();

        /*
         * Sync the products with the file.
         */
        $file->products()->sync($request->input('product_id'));

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
        $file->path == 'files/deleted.pdf' || Storage::delete($file->path);

        return response()->json([
            'message' => 'Successfully deleted.',
        ], Response::HTTP_OK);
    }
}
