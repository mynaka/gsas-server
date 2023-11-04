<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant\ApplicantBasicInfo;
use App\Models\Applicant\ApplicantContactInfo;

class ApplicantContactInfoController extends Controller {
    /**
     * CREATE contact information for the applicant
     */
    public function createApplicantContactInfo(Request $request){
        $applicant_basic_info_id = $request->input('applicant_basic_info_id');
        $contact_type = $request->input('contact_type');
        $contact_details = $request->input('contact_details');

        try {
            $applicantContactInfo = new ApplicantContactInfo;
    
            $applicantContactInfo->contact_type = $contact_type;
            $applicantContactInfo->contact_details = $contact_details;
            
            $basicInfo = ApplicantBasicInfo::findOrFail($applicant_basic_info_id);
            $basicInfo->contactInfo()->save($applicantContactInfo);
    
            return response()->json(['status' => 200, 'error' => '', 'data' => [$applicantContactInfo]]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }

    /**
     * READ all contact information of the applicant with applicant_basic_info_id = applicantId
     */
    public function getApplicantContactInfo(Request $request, $applicantId) {
        try {
            $contactInfo = ApplicantContactInfo::where('applicant_basic_info_id', $applicantId)->get();
            if ($contactInfo) {
                return response()->json(['status' => 200, 'error' => '', 'data' => $contactInfo]);
            } else {
                return response()->json(['status' => 404, 'error' => 'Applicant not found', 'data' => null]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }
}
