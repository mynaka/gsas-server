<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant\ApplicantBasicInfo;
use App\Models\Applicant\ApplicantRefereeInfo;

class ApplicantRefereeInfoController extends Controller {
    /**
     * CREATE referee information for the applicant
     */
    public function createApplicantRefereeInfo(Request $request) {
        $applicant_basic_info_id = $request->input('applicant_basic_info_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $type = $request->input('type');

        try {
            $applicantRefereeInfo = new ApplicantRefereeInfo;
    
            $applicantRefereeInfo->name = $name;
            $applicantRefereeInfo->email = $email;
            $applicantRefereeInfo->type = $type;
            
            $basicInfo = ApplicantBasicInfo::findOrFail($applicant_basic_info_id);
            $basicInfo->refereeInfo()->save($applicantRefereeInfo);
    
            return response()->json(['status' => 200, 'error' => '', 'data' => [$applicantRefereeInfo]]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }

    /**
     * READ referee information of the applicant with applicant_basic_info_id = applicantId
     */
    public function getApplicantRefereeInfo(Request $request, $applicantId) {
        try {
            $refereeInfo = ApplicantRefereeInfo::where('applicant_basic_info_id', $applicantId)->get();
            if ($refereeInfo) {
                return response()->json(['status' => 200, 'error' => '', 'data' => $refereeInfo]);
            } else {
                return response()->json(['status' => 404, 'error' => 'Applicant not found', 'data' => null]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }
}
