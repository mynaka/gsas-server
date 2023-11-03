<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant\ApplicantBasicInfoController;

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

Route::post('/applicants/createBasicInfo', [ApplicantBasicInfoController::class, 'createApplicantBasicInfoMany']);
Route::group(['prefix' => 'applicants'], function () {
    Route::get('/createBasicInfo', [ApplicantBasicInfoController::class, 'createApplicantBasicInfo'])->name('applicants.create_basic');
    Route::get('/basicInfo/{id}', [ApplicantBasicInfoController::class, 'getApplicantBasicInfo'])->name('applicants.get_basic');
});
