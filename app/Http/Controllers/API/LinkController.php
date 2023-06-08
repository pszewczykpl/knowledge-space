<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class LinkController extends Controller
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
        return LinkResource::collection(Link::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreLinkRequest  $request
     * @return JsonResponse
     */
    public function store(StoreLinkRequest $request)
    {
        $link = Link::create($request->validated());
        auth()->user()->links()->save($link);

        return response()->json([
            'message' => 'Successfully created.',
            'data' => new LinkResource($link),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  Link  $link
     * @return LinkResource
     */
    public function show(Link $link)
    {
        return new LinkResource($link);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateLinkRequest  $request
     * @param  Link  $link
     * @return JsonResponse
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        $link->update($request->validated());

        return response()->json([
            'message' => 'Updated successfully.',
            'data' => new LinkResource($link)
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Link  $link
     * @return JsonResponse
     */
    public function destroy(Link $link)
    {
        $link->delete();

        return response()->json([
            'message' => 'Successfully deleted.',
        ], Response::HTTP_OK);
    }
}
