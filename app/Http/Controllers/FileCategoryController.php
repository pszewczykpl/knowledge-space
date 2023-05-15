<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileCategoryRequest;
use App\Http\Requests\UpdateFileCategoryRequest;
use App\Http\Resources\FileCategoryCollection;
use App\Http\Resources\FileCategoryResource;
use App\Models\FileCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class FileCategoryController extends Controller
{
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreFileCategoryRequest $request)
    {
        $fileCategory = FileCategory::create($request->validated());

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
    public function show(FileCategory $fileCategory)
    {
        return new FileCategoryResource($fileCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFileCategoryRequest  $request
     * @param  FileCategory  $fileCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateFileCategoryRequest $request, FileCategory $fileCategory)
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(FileCategory $fileCategory)
    {
        $fileCategory->delete();

        return response()->json([
            'message' => 'Successfully deleted.',
        ], Response::HTTP_OK);
    }
}
