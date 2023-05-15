<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CommentCollection
     */
    public function index()
    {
        return new CommentCollection(Comment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCommentRequest  $request
     * @return JsonResponse
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::create($request->validated());

        return response()->json([
            'message' => 'Successfully created.',
            'data' => new CommentResource($comment),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  Comment  $comment
     * @return CommentResource
     */
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCommentRequest  $request
     * @param  Comment  $comment
     * @return JsonResponse
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated.',
            'data' => new CommentResource($comment),
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comment  $comment
     * @return JsonResponse
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json([
            'message' => 'Successfully deleted.',
        ], Response::HTTP_OK);
    }
}
