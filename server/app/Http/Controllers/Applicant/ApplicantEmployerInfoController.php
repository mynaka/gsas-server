<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant\ApplicantBasicInfo;
use App\Models\Applicant\ApplicantEmployerInfo;


// UNUSED CONTROLLER
class ApplicantEmployerInfoController extends Controller {
    /**
     * CREATE employer information for the applicant
     */
    public function createApplicantEmployerInfo(Request $request){
        $applicant_basic_info_id = $request->input('applicant_basic_info_id');
        $position = $request->input('position');
        $institution = $request->input('institution');
        $street_address = $request->input('street_address');
        $town_city = $request->input('town_city');
        $province_state = $request->input('province_state');
        $country = $request->input('country');
        $zip = $request->input('zip');
        $employer_contact_number = $request->input('employer_contact_number');
        $employer_email = $request->input('employer_email');
        $is_active = $request->input('is_active');
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');

        try {
            $applicantEmployerInfo = new ApplicantEmployerInfo;
    
            $applicantEmployerInfo->position = $position;
            $applicantEmployerInfo->institution = $institution;
            $applicantEmployerInfo->street_address = $street_address;
            $applicantEmployerInfo->town_city = $town_city;
            $applicantEmployerInfo->province_state = $province_state;
            $applicantEmployerInfo->country = $country;
            $applicantEmployerInfo->zip = $zip;
            $applicantEmployerInfo->employer_contact_number = $employer_contact_number;
            $applicantEmployerInfo->employer_email = $employer_email;
            $applicantEmployerInfo->date_start = $date_start;
            $applicantEmployerInfo->date_end = $date_end;
            
            $basicInfo = ApplicantBasicInfo::findOrFail($applicant_basic_info_id);
            $basicInfo->employerInfo()->save($applicantEmployerInfo);
    
            return response()->json(['status' => 200, 'error' => '', 'data' => [$applicantEmployerInfo]]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }

    /**
     * READ employer information of the applicant with applicant_basic_info_id = applicantId
     */
    public function getApplicantEmployerInfo(Request $request, $applicantId) {
        try {
            $employerInfo = ApplicantEmployerInfo::where('applicant_basic_info_id', $applicantId)->get();
            if ($employerInfo) {
                return response()->json(['status' => 200, 'error' => '', 'data' => $employerInfo]);
            } else {
                return response()->json(['status' => 404, 'error' => 'Applicant not found', 'data' => null]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }
}
