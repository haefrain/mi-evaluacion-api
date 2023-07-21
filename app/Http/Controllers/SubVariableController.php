<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\SubVariable;
use App\Http\Requests\StoreSubVariableRequest;
use App\Http\Requests\UpdateSubVariableRequest;
use Illuminate\Http\Response;
use Throwable;

class SubVariableController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(SubVariable::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $subVariables = SubVariable::all();
            return new ApiSuccessResponse($subVariables, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubVariableRequest $request)
    {
        try {
            $subVariable = SubVariable::create($request->all());
            return new ApiSuccessResponse($subVariable, Response::HTTP_CREATED);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubVariable $subVariable)
    {
        try {
            return new ApiSuccessResponse($subVariable, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubVariableRequest $request, SubVariable $subVariable)
    {
        try {
            $subVariable->update($request->all());
            return new ApiSuccessResponse($subVariable, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubVariable $subVariable)
    {
        try {
            $subVariable->delete();
            return new ApiSuccessResponse($subVariable, Response::HTTP_NO_CONTENT);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
