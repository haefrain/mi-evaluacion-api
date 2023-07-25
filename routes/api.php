<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\VariableController;
use App\Http\Controllers\SubVariableController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DependencyController;
use App\Http\Controllers\CorporativeGroupController;
use App\Http\Controllers\TypeAppointmentController;
use App\Http\Controllers\PersonController;

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
Route::post('login', [AuthenticationController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthenticationController::class, 'logout']);

Route::middleware('auth:sanctum')->resource('roles', RoleController::class);
Route::middleware('auth:sanctum')->resource('users', UserController::class);
Route::middleware('auth:sanctum')->resource('groups', GroupController::class);
Route::middleware('auth:sanctum')->resource('variables', VariableController::class);
Route::middleware('auth:sanctum')->resource('sub-variables', SubVariableController::class);
Route::middleware('auth:sanctum')->resource('questions', QuestionController::class);
Route::middleware('auth:sanctum')->resource('options', OptionController::class);
Route::middleware('auth:sanctum')->resource('answers', AnswerController::class);
Route::middleware('auth:sanctum')->resource('companies', CompanyController::class);
Route::middleware('auth:sanctum')->resource('instruments', InstrumentController::class);
Route::middleware('auth:sanctum')->resource('dependencies', DependencyController::class);
Route::middleware('auth:sanctum')->resource('positions', PositionController::class);
Route::middleware('auth:sanctum')->resource('corporative-groups', CorporativeGroupController::class);
Route::middleware('auth:sanctum')->resource('type-appointments', TypeAppointmentController::class);
Route::middleware('auth:sanctum')->resource('people', PersonController::class);
