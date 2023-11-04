<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant\ApplicantBasicInfo;
use App\Models\Applicant\ApplicantOtherInfo;

class ApplicantOtherInfoController extends Controller {
    /**
     * CREATE miscellaneous information for the applicant
     */
    public function createApplicantOtherInfo(Request $request){
        $applicant_basic_info_id = $request->input('applicant_basic_info_id');
        $has_applied = $request->input('has_applied');
        $result = $request->input('result');
        $date_of_result = $request->input('date_of_result');

        try {
            $applicantOtherInfo = new ApplicantOtherInfo;

            $applicantOtherInfo->has_applied = $has_applied;
            $applicantOtherInfo->result = $result;
            $applicantOtherInfo->date_of_result = $date_of_result;
            
            $basicInfo = ApplicantBasicInfo::findOrFail($applicant_basic_info_id);
            $basicInfo->otherInfo()->save($applicantOtherInfo);
    
            return response()->json(['status' => 200, 'error' => '', 'data' => [$applicantOtherInfo]]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }

    /**
     * READ miscellaneous information of the applicant with applicant_basic_info_id = applicantId
     */
    public function getApplicantOtherInfo(Request $request, $applicantId) {
        try {
            $otherInfo = ApplicantOtherInfo::where('applicant_basic_info_id', $applicantId)->get();
            if ($otherInfo) {
                return response()->json(['status' => 200, 'error' => '', 'data' => $otherInfo]);
            } else {
                return response()->json(['status' => 404, 'error' => 'Applicant not found', 'data' => null]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => [$e]]);
        }
    }
}
