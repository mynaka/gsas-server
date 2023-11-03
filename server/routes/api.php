<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant\ApplicantBasicInfoController;
use App\Http\Controllers\Applicant\ApplicantAcademicInfoController;
use App\Http\Controllers\Applicant\ApplicantAddressController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/create-basic-info', [ApplicantBasicInfoController::class, 'createApplicantBasicInfo']) -> name('applicants.create_basic');
Route::post('/test', [ApplicantAddressController::class, 'createApplicantAddress']);