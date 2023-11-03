<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant\ApplicantBasicInfoController;
use App\Http\Controllers\Applicant\ApplicantAcademicInfoController;
use App\Http\Controllers\Applicant\ApplicantAddressController;

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
    //POST routes
    Route::post('/create-basic-info', [ApplicantBasicInfoController::class, 'createApplicantBasicInfo']) -> name('applicants.create_basic');
    Route::post('/create-academic-info', [ApplicantAcademicInfoController::class, 'createApplicantAcademicInfo']) -> name('applicants.create_academic');
    Route::post('/create-address', [ApplicantAddressController::class, 'createApplicantAddress']) -> name('applicants.create_address');

    //GET routes
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/basic-info', [ApplicantBasicInfoController::class, 'getApplicantBasicInfo']) -> name('applicants.get_basic');
        Route::get('/academic-info', [ApplicantAcademicInfoController::class, 'getApplicantAcademicInfo']) -> name('applicants.get_academic');
        Route::get('/address', [ApplicantAddressController::class, 'getApplicantAddress']) -> name('applicants.get_address');
    });
});
