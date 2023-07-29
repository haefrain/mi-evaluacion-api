<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Question;
use App\Models\User;
use App\Models\UserInstrument;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Rap2hpoutre\FastExcel\FastExcel;
use Throwable;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index()
    {
        $totalQuestions = Question::all()->count();
        $totalParticipants = UserInstrument::all()->count();
        $totalPages = ceil($totalQuestions / 3);
        $totalParticipantsNotBegined = UserInstrument::where('page', 0)->count();
        $totalParticipantsBegined = UserInstrument::where('page', '<', $totalPages)->where('page', '>', 0)->count();
        $totalParticipantsFinished = UserInstrument::where('page', '>=', $totalPages)->count();
        try {
            $data = [
                'totalQuestions' => $totalQuestions,
                'totalParticipants' => $totalParticipants,
                'totalParticipantsNotBegined' => $totalParticipantsNotBegined,
                'totalParticipantsBegined' => $totalParticipantsBegined,
                'totalParticipantsFinished' => $totalParticipantsFinished,
            ];
            return new ApiSuccessResponse($data, Response::HTTP_OK);

        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function exportExcelParticipants()
    {

        $users = User::all();
        $filename = 'participants_'.date('Y-m-d_H:i:s').'.xlsx';
        (new FastExcel($users))->export($filename);
        return new ApiSuccessResponse(asset($filename), Response::HTTP_OK);

    }

    public function exportExcelParticipantsWithAnswers()
    {

    }
}
