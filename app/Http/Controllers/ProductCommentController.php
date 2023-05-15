<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;

class ProductCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Product  $product
     * @return CommentCollection
     */
    public function index(Product $product)
    {
        return new CommentCollection($product->comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCommentRequest  $request
     * @param  Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCommentRequest $request, Product $product): \Illuminate\Http\JsonResponse
    {
        $comment = $product->comments()->create([
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id
        ]);

        return response()->json([
            'message' => 'Successfully created.',
            'data' => new CommentResource($comment),
        ], Response::HTTP_CREATED);
    }
}
