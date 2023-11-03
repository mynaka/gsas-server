<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant\ApplicantBasicInfo;

class ApplicantBasicInfoController extends Controller {
    /**
     * CREATE basic information for the applicant
     */
    public function createApplicantBasicInfoMany(Request $request) {
        $first_name = $request->input('first_name');
        $middle_name = $request->input('middle_name');
        $last_name = $request->input('last_name');
        $sex = $request->input('sex');
        $date_of_birth = $request->input('date_of_birth');
        $citizenship = $request->input('citizenship');
        $civil_status = $request->input('civil_status');

        // Create a new ApplicantBasicInfo instance
        $basicInfo = new ApplicantBasicInfo;

        $basicInfo->first_name = $first_name;
        $basicInfo->middle_name = $middle_name;
        $basicInfo->last_name = $last_name;
        $basicInfo->sex = $sex;
        $basicInfo->date_of_birth = $date_of_birth;
        $basicInfo->citizenship = $citizenship;
        $basicInfo->civil_status = $civil_status;

        try {
            $basicInfo->save(); // Save the model instance

            return response()->json(['status' => 200, 'error' => '', 'data' => []]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }
}
