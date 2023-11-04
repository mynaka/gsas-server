<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant\ApplicantBasicInfo;
use App\Models\Applicant\ApplicantPublicationInfo;

class ApplicantPublicationInfoController extends Controller {
    /**
     * CREATE publication information for the applicant
     */
    public function createApplicantPublicationInfo(Request $request){
        $applicant_basic_info_id = $request->input('applicant_basic_info_id');
        $institution = $request->input('institution');
        $position = $request->input('position');
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');

        try {
            $applicantPublicationInfo = new ApplicantPublicationInfo;
    
            $applicantPublicationInfo->position = $position;
            $applicantPublicationInfo->institution = $institution;
            $applicantPublicationInfo->date_start = $date_start;
            $applicantPublicationInfo->date_end = $date_end;
            
            $basicInfo = ApplicantBasicInfo::findOrFail($applicant_basic_info_id);
            $basicInfo->publicationInfo()->save($applicantPublicationInfo);
    
            return response()->json(['status' => 200, 'error' => '', 'data' => [$applicantPublicationInfo]]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }

    /**
     * READ publication information of the applicant with applicant_basic_info_id = applicantId
     */
    public function getApplicantPublicationInfo(Request $request, $applicantId) {
        try {
            $publicationInfo = ApplicantPublicationInfo::where('applicant_basic_info_id', $applicantId)->get();
            if ($publicationInfo) {
                return response()->json(['status' => 200, 'error' => '', 'data' => $publicationInfo]);
            } else {
                return response()->json(['status' => 404, 'error' => 'Applicant not found', 'data' => null]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }
}