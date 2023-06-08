<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreFileCategoryRequest;
use App\Http\Requests\UpdateFileCategoryRequest;
use App\Http\Resources\FileCategoryResource;
use App\Models\FileCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class FileCategoryController extends Controller
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
        return FileCategoryResource::collection(FileCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFileCategoryRequest  $request
     * @return JsonResponse
     */
    public function store(StoreFileCategoryRequest $request): JsonResponse
    {
        $fileCategory = FileCategory::create($request->validated());
        auth()->user()->fileCategories()->save($fileCategory);

        return response()->json([
            'message' => 'Successfully created.',
            'data' => new FileCategoryResource($fileCategory),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  FileCategory  $fileCategory
     * @return FileCategoryResource
     */
    public function show(FileCategory $fileCategory): FileCategoryResource
    {
        return new FileCategoryResource($fileCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFileCategoryRequest  $request
     * @param  FileCategory  $fileCategory
     * @return JsonResponse
     */
    public function update(UpdateFileCategoryRequest $request, FileCategory $fileCategory): JsonResponse
    {
        $fileCategory->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated.',
            'data' => new FileCategoryResource($fileCategory),
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  FileCategory  $fileCategory
     * @return JsonResponse
     */
    public function destroy(FileCategory $fileCategory): JsonResponse
    {
        $fileCategory->delete();

        return response()->json([
            'message' => 'Successfully deleted.',
        ], Response::HTTP_OK);
    }
}
