<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant\ApplicantBasicInfo;
use App\Models\Applicant\ApplicantScholarshipInfo;

class ApplicantScholarshipInfoController extends Controller {
    /**
     * CREATE scholarship information for the applicant
     */
    public function createApplicantScholarshipInfo(Request $request){
        $applicant_basic_info_id = $request->input('applicant_basic_info_id');
        $institution = $request->input('institution');
        $position = $request->input('position');
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');

        try {
            $applicantScholarshipInfo = new ApplicantScholarshipInfo;
            
            $applicantScholarshipInfo->institution = $institution;
            $applicantScholarshipInfo->position = $position;
            $applicantScholarshipInfo->date_start = $date_start;
            $applicantScholarshipInfo->date_end = $date_end;
            
            $basicInfo = ApplicantBasicInfo::findOrFail($applicant_basic_info_id);
            $basicInfo->scholarshipInfo()->save($applicantScholarshipInfo);
    
            return response()->json(['status' => 200, 'error' => '', 'data' => [$applicantScholarshipInfo]]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }

    /**
     * READ scholarship information of the applicant with applicant_basic_info_id = applicantId
     */
    public function getApplicantScholarshipInfo(Request $request, $applicantId) {
        try {
            $scholarshipInfo = ApplicantScholarshipInfo::where('applicant_basic_info_id', $applicantId)->get();
            if ($scholarshipInfo) {
                return response()->json(['status' => 200, 'error' => '', 'data' => $scholarshipInfo]);
            } else {
                return response()->json(['status' => 404, 'error' => 'Applicant not found', 'data' => null]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }
}
