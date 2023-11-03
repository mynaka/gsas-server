<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant\ApplicantBasicInfoController;
use App\Http\Controllers\Applicant\ApplicantAcademicInfoController;

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
    Route::post('/create-basic-info', [ApplicantBasicInfoController::class, 'createApplicantBasicInfo']) -> name('applicants.create_basic');
    Route::post('/create-academic-info', [ApplicantAcademicInfoController::class, 'createApplicantAcademicInfo']) -> name('applicants.create_academic');

    Route::group(['prefix' => '{id}'], function () {
        Route::get('/basic-info', [ApplicantBasicInfoController::class, 'getApplicantBasicInfo']) -> name('applicants.get_basic');
        Route::get('/academic-info', [ApplicantAcademicInfoController::class, 'getApplicantAcademicInfo']) -> name('applicants.get_academic');
    });
});
