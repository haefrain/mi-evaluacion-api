<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Company;
use App\Models\CorporativeGroup;
use App\Models\Dependency;
use App\Models\Group;
use App\Models\Instrument;
use App\Models\Position;
use App\Models\Question;
use App\Models\TypeAppointment;
use App\Models\Variable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Throwable;

class AuthenticationController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only('document_number', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken('SPA Token')->plainTextToken;

                $dataList = [
                    'company' => Company::first(),
                    'positions' => Position::all(),
                    'dependencies' => Dependency::all(),
                    'typeAppointments' => TypeAppointment::all(),
                    'corporativeGroups' => CorporativeGroup::all(),
                    'quantityQuestions' => ceil(Question::all()->count() / 3),
                ];
                return new ApiSuccessResponse(['token' => $token, 'user' => $user, 'data_list' => $dataList], Response::HTTP_OK);
            } else {
                return new ApiErrorResponse('Usuario o contraseña incorrectos.', null, Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // TODO :: Pendiente por implementar.
    public function request_reset_password()
    {

    }

    // TODO :: Pendiente por implementar.
    public function reset_password()
    {

    }

    public function logout(Request $request)
    {
        try {
            return new ApiSuccessResponse($request->user()->tokens()->delete(), Response::HTTP_NO_CONTENT);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
