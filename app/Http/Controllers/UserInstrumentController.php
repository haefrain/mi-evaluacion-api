<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\UserInstrument;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class UserInstrumentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(UserInstrument::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $userInstruments = UserInstrument::all();
            return new ApiSuccessResponse($userInstruments, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $userInstrument = UserInstrument::create($request->all());
            return new ApiSuccessResponse($userInstrument, Response::HTTP_CREATED);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserInstrument $userInstrument)
    {
        try {
            return new ApiSuccessResponse($userInstrument, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserInstrument $userInstrument)
    {
        try {
            $userInstrument->update($request->all());
            return new ApiSuccessResponse($userInstrument, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserInstrument $userInstrument)
    {
        try {
            $userInstrument->delete();
            return new ApiSuccessResponse($userInstrument, Response::HTTP_NO_CONTENT);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
