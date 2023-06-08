<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class ProductCommentController extends Controller
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
     * @param  Product  $product
     * @return AnonymousResourceCollection
     */
    public function index(Product $product)
    {
        return CommentResource::collection($product->comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCommentRequest  $request
     * @param  Product  $product
     * @return JsonResponse
     */
    public function store(StoreCommentRequest $request, Product $product): JsonResponse
    {
        $comment = $product->comments()->create([
            'content' => $request->input('content')
        ]);
        auth()->user()->comments()->save($comment);

        return response()->json([
            'message' => 'Successfully created.',
            'data' => new CommentResource($comment),
        ], Response::HTTP_CREATED);
    }
}
