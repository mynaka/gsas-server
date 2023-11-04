<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant\ApplicantBasicInfoController;
use App\Http\Controllers\Applicant\ApplicantAcademicInfoController;
use App\Http\Controllers\Applicant\ApplicantAddressController;
use App\Http\Controllers\Applicant\ApplicantContactInfoController;
use App\Http\Controllers\Applicant\ApplicantEmployerInfoController;
use App\Http\Controllers\Applicant\ApplicantOrgMembershipInfoController;

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

Route::post('/create-basic-info', [ApplicantBasicInfoController::class, 'createApplicantBasicInfo']) -> name('applicants.create_basic_api');
Route::post('/create-contact-info', [ApplicantContactInfoController::class, 'createApplicantContactInfo']) -> name('applicants.create_contact_api');
Route::post('/create-employer-info', [ApplicantEmployerInfoController::class, 'createApplicantEmployerInfo']) -> name('applicants.create_employer_api');
Route::post('/create-org-info', [ApplicantOrgMembershipInfoController::class, 'createApplicantOrgMembershipInfo']) -> name('applicants.create_org_api');