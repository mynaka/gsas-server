<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant\ApplicantBasicInfoController;
use App\Http\Controllers\Applicant\ApplicantAcademicInfoController;
use App\Http\Controllers\Applicant\ApplicantAddressController;
use App\Http\Controllers\Applicant\ApplicantContactInfoController;
use App\Http\Controllers\Applicant\ApplicantEmployerInfoController;
use App\Http\Controllers\Applicant\ApplicantOrgMembershipInfoController;
use App\Http\Controllers\Applicant\ApplicantScholarshipInfoController;
use App\Http\Controllers\Applicant\ApplicantOtherInfoController;
use App\Http\Controllers\Applicant\ApplicantPublicationInfoController;
use App\Http\Controllers\Applicant\ApplicantRefereeInfoController;

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

Route::group(['prefix' => 'applicants', 'namespace' => 'Applicant'], function () {
    //POST routes (/api/applicants/<endpoint>)
    Route::post('/create-basic-info', [ApplicantBasicInfoController::class, 'createApplicantBasicInfo']);
    Route::post('/create-academic-info', [ApplicantAcademicInfoController::class, 'createApplicantAcademicInfo']);
    Route::post('/create-address', [ApplicantAddressController::class, 'createApplicantAddress']);
    Route::post('/create-contact-info', [ApplicantContactInfoController::class, 'createApplicantContactInfo']);
    Route::post('/create-employer-info', [ApplicantEmployerInfoController::class, 'createApplicantEmployerInfo']);
    Route::post('/create-org-info', [ApplicantOrgMembershipInfoController::class, 'createApplicantOrgMembershipInfo']);
    Route::post('/create-scholarship-info', [ApplicantScholarshipInfoController::class, 'createApplicantScholarshipInfo']);
    Route::post('/create-other-info', [ApplicantOtherInfoController::class, 'createApplicantOtherInfo']);
    Route::post('/create-publication-info', [ApplicantPublicationInfoController::class, 'createApplicantPublicationInfo']);
    Route::post('/create-referee-info', [ApplicantRefereeInfoController::class, 'createApplicantRefereeInfo']);

    //GET routes (/api/applicants/{id}/<endpoint>)
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/basic-info', [ApplicantBasicInfoController::class, 'getApplicantBasicInfo']);
        Route::get('/academic-info', [ApplicantAcademicInfoController::class, 'getApplicantAcademicInfo']);
        Route::get('/address', [ApplicantAddressController::class, 'getApplicantAddress']);
        Route::get('/contact-info', [ApplicantContactInfoController::class, 'getApplicantContactInfo']);
        Route::get('/employments', [ApplicantEmployerInfoController::class, 'getApplicantEmployerInfo']);
        Route::get('/organizations', [ApplicantOrgMembershipInfoController::class, 'getApplicantOrgMembershipInfo']);
        Route::get('/scholarships', [ApplicantScholarshipInfoController::class, 'getApplicantScholarshipInfo']);
        Route::get('/misc', [ApplicantOtherInfoController::class, 'getApplicantOtherInfo']);
        Route::get('/publications', [ApplicantPublicationInfoController::class, 'getApplicantPublicationInfo']);
        Route::post('/referees', [ApplicantRefereeInfoController::class, 'getApplicantRefereeInfo']);
    });
});
