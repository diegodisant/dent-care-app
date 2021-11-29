<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\PatientController;
use App\Http\Controllers\Api\V1\AppointmentController;
use App\Http\Controllers\Api\V1\MedicalNoteController;
use App\Http\Controllers\Api\V1\ClinicalHistoryController;
use App\Http\Controllers\Api\V1\ClinicalHistoryAnswerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource(
    '/v1/users',
    UserController::class
)
    ->middleware('api');

Route::apiResource(
    '/v1/patients',
    PatientController::class
)
    ->middleware('api');

Route::apiResource(
    '/v1/appointments',
    AppointmentController::class
)
    ->middleware('api');

Route::apiResource(
    '/v1/medical_notes',
    MedicalNoteController::class
)
    ->middleware('api');

Route::apiResource(
    '/v1/clinical_histories',
    ClinicalHistoryController::class
)
    ->middleware('api');

Route::apiResource(
    '/v1/clinical_history_answers',
    ClinicalHistoryAnswerController::class
)
    ->middleware('api');

