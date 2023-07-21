<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Answer;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use Illuminate\Http\Response;
use Throwable;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Answer::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $answers = Answer::all();
            return new ApiSuccessResponse($answers, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnswerRequest $request)
    {
        try {
            $answer = Answer::create($request->all());
            return new ApiSuccessResponse($answer, Response::HTTP_CREATED);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        try {
            return new ApiSuccessResponse($answer, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        try {
            $answer->update($request->all());
            return new ApiSuccessResponse($answer, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        try {
            $answer->delete();
            return new ApiSuccessResponse($answer, Response::HTTP_NO_CONTENT);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
