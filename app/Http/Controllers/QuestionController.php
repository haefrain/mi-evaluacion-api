<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use Illuminate\Http\Response;
use Throwable;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Question::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $questions = Question::all();
            return new ApiSuccessResponse($questions, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        try {
            $question = Question::create($request->all());
            return new ApiSuccessResponse($question, Response::HTTP_CREATED);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        try {
            return new ApiSuccessResponse($question, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        try {
            $question->update($request->all());
            return new ApiSuccessResponse($question, Response::HTTP_OK);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        try {
            $question->delete();
            return new ApiSuccessResponse($question, Response::HTTP_NO_CONTENT);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
