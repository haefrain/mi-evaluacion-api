<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Dependency;
use App\Http\Requests\StoreDependencyRequest;
use App\Http\Requests\UpdateDependencyRequest;
use Illuminate\Http\Response;
use Throwable;

class DependencyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Dependency::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $dependencys = Dependency::all();
            return new ApiSuccessResponse($dependencys, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDependencyRequest $request)
    {
        try {
            $dependency = Dependency::create($request->all());
            return new ApiSuccessResponse($dependency, Response::HTTP_CREATED);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Dependency $dependency)
    {
        try {
            return new ApiSuccessResponse($dependency, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDependencyRequest $request, Dependency $dependency)
    {
        try {
            $dependency->update($request->all());
            return new ApiSuccessResponse($dependency, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dependency $dependency)
    {
        try {
            $dependency->delete();
            return new ApiSuccessResponse($dependency, Response::HTTP_NO_CONTENT);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
