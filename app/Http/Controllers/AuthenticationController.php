<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
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
                return new ApiSuccessResponse(['token' => $token, 'user' => $user], Response::HTTP_OK);
            } else {
                throw new \Exception('Usuario o contraseña incorrecto');
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
            $request->user()->currentAccessToken()->delete();
            return new ApiSuccessResponse(null, Response::HTTP_NO_CONTENT);
        } catch (Throwable $e) {
            return new ApiErrorResponse($e->getMessage(), $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
