<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant\ApplicantBasicInfo;
use App\Models\Applicant\ApplicantAcademicInfo;

class ApplicantAcademicInfoController extends Controller {
    /**
     * CREATE academic information for the applicant
     */
    public function createApplicantAcademicInfo(Request $request){
        $applicant_basic_info_id = $request->input('applicant_basic_info_id');
        $institution_name = $request->input('institution_name');
        $degree_level = $request->input('degree_level');
        $degree_received = $request->input('degree_received');
        $year_received = $request->input('year_received');
        $specialization_major = $request->input('specialization_major');
    
        try {
            // Create a new ApplicantAcademicInfo instance
            $academicInfo = new ApplicantAcademicInfo;

            $academicInfo->institution_name = $institution_name;
            $academicInfo->degree_level = $degree_level;
            $academicInfo->degree_received = $degree_received;
            $academicInfo->year_received = $year_received;
            $academicInfo->specialization_major = $specialization_major;

            $basicInfo = ApplicantBasicInfo::findOrFail($applicant_basic_info_id);
            $basicInfo->academicInfo()->save($academicInfo);
    
            return response()->json(['status' => 200, 'error' => '', 'data' => []]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }

    /**
     * READ academic information of the applicant with applicant_basic_info_id = applicantId
     */
    public function getApplicantAcademicInfo(Request $request, $applicantId) {
        try {
            $academicInfo = ApplicantAcademicInfo::where('applicant_basic_info_id', $applicantId)->first();
            if ($academicInfo) {
                return response()->json(['status' => 200, 'error' => '', 'data' => $academicInfo]);
            } else {
                return response()->json(['status' => 404, 'error' => 'Applicant not found', 'data' => null]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }
}
