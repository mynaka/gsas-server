<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant\ApplicantBasicInfoController;
use App\Http\Controllers\Applicant\ApplicantAcademicInfoController;
use App\Http\Controllers\Applicant\ApplicantAddressController;
use App\Http\Controllers\Applicant\ApplicantContactInfoController;
use App\Http\Controllers\Applicant\ApplicantEmployerInfoController;
use App\Http\Controllers\Applicant\ApplicantOrgMembershipInfoController;
use App\Http\Controllers\Applicant\ApplicantScholarshipInfoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'applicants', 'namespace' => 'Applicant'], function () {
    //POST routes (/applicants/<endpoint>)
    Route::post('/create-basic-info', [ApplicantBasicInfoController::class, 'createApplicantBasicInfo']) -> name('applicants.create_basic');
    Route::post('/create-academic-info', [ApplicantAcademicInfoController::class, 'createApplicantAcademicInfo']) -> name('applicants.create_academic');
    Route::post('/create-address', [ApplicantAddressController::class, 'createApplicantAddress']) -> name('applicants.create_address');
    Route::post('/create-contact-info', [ApplicantContactInfoController::class, 'createApplicantContactInfo']) -> name('applicants.create_contact');
    Route::post('/create-employer-info', [ApplicantEmployerInfoController::class, 'createApplicantEmployerInfo']) -> name('applicants.create_employer');
    Route::post('/create-org-info', [ApplicantOrgMembershipInfoController::class, 'createApplicantOrgMembershipInfo']) -> name('applicants.create_org');
    Route::post('/create-scholarship-info', [ApplicantScholarshipInfoController::class, 'createApplicantScholarshipInfo']) -> name('applicants.create_scholarship');

    //GET routes (/applicants/{id}/<endpoint>)
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/basic-info', [ApplicantBasicInfoController::class, 'getApplicantBasicInfo']) -> name('applicants.get_basic');
        Route::get('/academic-info', [ApplicantAcademicInfoController::class, 'getApplicantAcademicInfo']) -> name('applicants.get_academic');
        Route::get('/address', [ApplicantAddressController::class, 'getApplicantAddress']) -> name('applicants.get_address');
        Route::get('/contact-info', [ApplicantContactInfoController::class, 'getApplicantContactInfo']) -> name('applicants.get_contact');
        Route::get('/employment', [ApplicantEmployerInfoController::class, 'getApplicantEmployerInfo']) -> name('applicants.employer');
        Route::get('/organizations', [ApplicantOrgMembershipInfoController::class, 'getApplicantOrgMembershipInfo']) -> name('applicants.org');
        Route::get('/scholarships', [ApplicantScholarshipInfoController::class, 'getApplicantScholarshipInfo']) -> name('applicants.scholarship');
    });
});
