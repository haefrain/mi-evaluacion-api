<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\CorporativeGroup;
use App\Http\Requests\StoreCorporativeGroupRequest;
use App\Http\Requests\UpdateCorporativeGroupRequest;
use Illuminate\Http\Response;
use Throwable;

class CorporativeGroupController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(CorporativeGroup::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $corporativeGroups = CorporativeGroup::all();
            return new ApiSuccessResponse($corporativeGroups, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCorporativeGroupRequest $request)
    {
        try {
            $corporativeGroup = CorporativeGroup::create($request->all());
            return new ApiSuccessResponse($corporativeGroup, Response::HTTP_CREATED);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CorporativeGroup $corporativeGroup)
    {
        try {
            return new ApiSuccessResponse($corporativeGroup, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCorporativeGroupRequest $request, CorporativeGroup $corporativeGroup)
    {
        try {
            $corporativeGroup->update($request->all());
            return new ApiSuccessResponse($corporativeGroup, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CorporativeGroup $corporativeGroup)
    {
        try {
            $corporativeGroup->delete();
            return new ApiSuccessResponse($corporativeGroup, Response::HTTP_NO_CONTENT);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
