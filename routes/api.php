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
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('groups', GroupController::class);
Route::resource('variables', VariableController::class);
Route::resource('sub-variables', SubVariableController::class);
Route::resource('questions', QuestionController::class);
Route::resource('options', OptionController::class);
Route::resource('answers', AnswerController::class);
Route::resource('companies', CompanyController::class);
Route::resource('instruments', InstrumentController::class);
Route::resource('dependencies', DependencyController::class);
Route::resource('positions', PositionController::class);
Route::resource('corporative-groups', CorporativeGroupController::class);
Route::resource('type-appointments', TypeAppointmentController::class);
Route::resource('people', PersonController::class);
