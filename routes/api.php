<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\VariableController;
use App\Http\Controllers\SubVariableController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\AnswerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('groups', GroupController::class);
Route::resource('variables', VariableController::class);
Route::resource('sub-variables', SubVariableController::class);
Route::resource('questions', QuestionController::class);
Route::resource('options', OptionController::class);
Route::resource('answers', AnswerController::class);
