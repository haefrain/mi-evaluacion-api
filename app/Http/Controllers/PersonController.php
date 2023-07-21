<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Person;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use Illuminate\Http\Response;
use Throwable;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Person::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $persons = Person::all();
            return new ApiSuccessResponse($persons, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {
        try {
            $person = Person::create($request->all());
            return new ApiSuccessResponse($person, Response::HTTP_CREATED);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        try {
            return new ApiSuccessResponse($person, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        try {
            $person->update($request->all());
            return new ApiSuccessResponse($person, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        try {
            $person->delete();
            return new ApiSuccessResponse($person, Response::HTTP_NO_CONTENT);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
