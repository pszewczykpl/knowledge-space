<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreFileRequest;
use App\Http\Resources\FileResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class ProductFileController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Product $product
     * @return JsonResource
     */
    public function index(Product $product): JsonResource
    {
        return FileResource::collection($product->files);
    }

    /**
     * Display the specified resource.
     *
     * @param  StoreFileRequest  $request
     * @param  Product  $product
     * @return JsonResponse
     */
    public function store(StoreFileRequest $request, Product $product)
    {
        $file = $product->files()->create($request->all());

        if ($request->hasFile('file')) {
            $file->path = $request->file->store('files');
            $file->extension = $request->file('file')->extension();
        }
        auth()->user()->files()->save($file);

        $file->products()->attach($product);

        return response()->json([
            'message' => 'Successfully created.',
            'data' => new ProductResource($product),
        ], Response::HTTP_CREATED);
    }
}
