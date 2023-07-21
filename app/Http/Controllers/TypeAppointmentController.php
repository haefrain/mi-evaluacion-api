<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\TypeAppointment;
use App\Http\Requests\StoreTypeAppointmentRequest;
use App\Http\Requests\UpdateTypeAppointmentRequest;
use Illuminate\Http\Response;
use Throwable;

class TypeAppointmentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(TypeAppointment::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $typeAppointments = TypeAppointment::all();
            return new ApiSuccessResponse($typeAppointments, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeAppointmentRequest $request)
    {
        try {
            $typeAppointment = TypeAppointment::create($request->all());
            return new ApiSuccessResponse($typeAppointment, Response::HTTP_CREATED);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeAppointment $typeAppointment)
    {
        try {
            return new ApiSuccessResponse($typeAppointment, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeAppointmentRequest $request, TypeAppointment $typeAppointment)
    {
        try {
            $typeAppointment->update($request->all());
            return new ApiSuccessResponse($typeAppointment, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeAppointment $typeAppointment)
    {
        try {
            $typeAppointment->delete();
            return new ApiSuccessResponse($typeAppointment, Response::HTTP_NO_CONTENT);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
