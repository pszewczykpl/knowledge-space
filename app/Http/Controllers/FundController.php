<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundRequest;
use App\Http\Requests\UpdateFundRequest;
use App\Http\Resources\FundCollection;
use App\Http\Resources\FundResource;
use App\Models\Fund;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class FundController extends Controller
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
        return FundResource::collection(Fund::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFundRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreFundRequest $request)
    {
        $fund = Fund::create($request->validated());

        return response()->json([
            'message' => 'Successfully created.',
            'data' => new FundResource($fund),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  Fund  $fund
     * @return FundResource
     */
    public function show(Fund $fund)
    {
        return new FundResource($fund);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFundRequest  $request
     * @param  Fund  $fund
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateFundRequest $request, Fund $fund)
    {
        $fund->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated.',
            'data' => new FundResource($fund),
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Fund  $fund
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Fund $fund)
    {
        $fund->delete();

        return response()->json([
            'message' => 'Successfully deleted.',
        ], Response::HTTP_OK);
    }
}
