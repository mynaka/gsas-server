<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant\ApplicantBasicInfo;
use App\Models\Applicant\ApplicantAddress;

class ApplicantAddressController extends Controller {
    /**
     * CREATE address information for the applicant
     */
    public function createApplicantAddress(Request $request){
        $applicant_basic_info_id = $request->input('applicant_basic_info_id');
        $address_type = $request->input('address_type');
        $street_address = $request->input('street_address');
        $town_city = $request->input('town_city');
        $province_state = $request->input('province_state');
        $country = $request->input('country');
        $zip = $request->input('zip');
    
        try {
            $applicantAddress = new ApplicantAddress;
    
            $applicantAddress->address_type = $address_type;
            $applicantAddress->street_address = $street_address;
            $applicantAddress->town_city = $town_city;
            $applicantAddress->province_state = $province_state;
            $applicantAddress->country = $country;
            $applicantAddress->zip = $zip;
            
            $basicInfo = ApplicantBasicInfo::findOrFail($applicant_basic_info_id);
            $basicInfo->address()->save($applicantAddress);
    
            return response()->json(['status' => 200, 'error' => '', 'data' => [$applicantAddress]]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }

    /**
     * READ address information of the applicant with applicant_basic_info_id = applicantId
     */
    public function getApplicantAddress(Request $request, $applicantId) {
        try {
            $addressInfo = ApplicantAddress::where('applicant_basic_info_id', $applicantId)->first();
            if ($addressInfo) {
                return response()->json(['status' => 200, 'error' => '', 'data' => $addressInfo]);
            } else {
                return response()->json(['status' => 404, 'error' => 'Applicant not found', 'data' => null]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }
}
