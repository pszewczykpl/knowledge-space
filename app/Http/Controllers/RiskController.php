<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRiskRequest;
use App\Http\Requests\UpdateRiskRequest;
use App\Http\Resources\RiskCollection;
use App\Http\Resources\RiskResource;
use App\Models\Risk;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class RiskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return RiskCollection
     */
    public function index()
    {
        return new RiskCollection(Risk::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRiskRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRiskRequest $request)
    {
        $risk = Risk::create($request->validated());
        auth()->user()->risks()->save($risk);

        return response()->json([
            'message' => 'Successfully created.',
            'data' => new RiskResource($risk),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  Risk  $risk
     * @return RiskResource
     */
    public function show(Risk $risk)
    {
        return new RiskResource($risk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRiskRequest  $request
     * @param  Risk  $risk
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRiskRequest $request, Risk $risk)
    {
        $risk->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated.',
            'data' => new RiskResource($risk),
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Risk  $risk
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Risk $risk)
    {
        $risk->delete();

        return response()->json([
            'message' => 'Successfully deleted.',
        ], Response::HTTP_OK);
    }
}
