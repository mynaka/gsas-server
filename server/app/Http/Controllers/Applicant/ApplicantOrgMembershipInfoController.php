<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant\ApplicantBasicInfo;
use App\Models\Applicant\ApplicantOrgMembershipInfo;


// UNUSED CONTROLLER
class ApplicantOrgMembershipInfoController extends Controller {
    /**
     * CREATE organization information for the applicant
     */
    public function createApplicantOrgMembershipInfo(Request $request){
        $applicant_basic_info_id = $request->input('applicant_basic_info_id');
        $institution = $request->input('institution');
        $position = $request->input('position');
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');

        try {
            $applicantOrgMembershipInfo = new ApplicantOrgMembershipInfo;
    
            $applicantOrgMembershipInfo->position = $position;
            $applicantOrgMembershipInfo->institution = $institution;
            $applicantOrgMembershipInfo->date_start = $date_start;
            $applicantOrgMembershipInfo->date_end = $date_end;
            
            $basicInfo = ApplicantBasicInfo::findOrFail($applicant_basic_info_id);
            $basicInfo->orgMembershipInfo()->save($applicantOrgMembershipInfo);
    
            return response()->json(['status' => 200, 'error' => '', 'data' => [$applicantOrgMembershipInfo]]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }

    /**
     * READ organization information of the applicant with applicant_basic_info_id = applicantId
     */
    public function getApplicantOrgMembershipInfo(Request $request, $applicantId) {
        try {
            $orgMembershipInfo = ApplicantOrgMembershipInfo::where('applicant_basic_info_id', $applicantId)->get();
            if ($orgMembershipInfo) {
                return response()->json(['status' => 200, 'error' => '', 'data' => $orgMembershipInfo]);
            } else {
                return response()->json(['status' => 404, 'error' => 'Applicant not found', 'data' => null]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }
}
