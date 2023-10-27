<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantAcademicInfo;
use App\Models\ApplicantAddress;

class ApplicantController extends Controller
{
    /**
     * CREATE academic information for the applicant
     */
    public function createApplicantAcademicInfoMany(Request $request){
        $applicant_id = $request->input('applicant_id');
        $institution_name = $request->input('institution_name');
        $degree_level = $request->input('degree_level');
        $degree_received = $request->input('degree_received');
        $year_received = $request->input('year_received');
        $specialization_major = $request->input('specialization_major');
    
        // Create a new ApplicantAcademicInfo instance
        $academicInfo = new ApplicantAcademicInfo;
    
        $academicInfo->applicant_id = $applicant_id;
        $academicInfo->institution_name = $institution_name;
        $academicInfo->degree_level = $degree_level;
        $academicInfo->degree_received = $degree_received;
        $academicInfo->year_received = $year_received;
        $academicInfo->specialization_major = $specialization_major;
    
        try {
            $academicInfo->save(); // Save the model instance
    
            return response()->json(['status' => 200, 'error' => '', 'data' => []]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }

    /**
     * CREATE address information for the applicant
     */
    public function createApplicantAddressMany(Request $request){
        $applicant_id = $request->input('applicant_id');
        $address_type = $request->input('address_type');
        $street_address = $request->input('street_address');
        $town_city = $request->input('town_city');
        $province_state = $request->input('province_state');
        $country = $request->input('country');
        $zip = $request->input('zip');
    
        // Create a new ApplicantAddress instance
        $applicantAddress = new ApplicantAddress;
    
        $applicantAddress->applicant_id = $applicant_id;
        $applicantAddress->address_type = $address_type;
        $applicantAddress->street_address = $street_address;
        $applicantAddress->town_city = $town_city;
        $applicantAddress->province_state = $province_state;
        $applicantAddress->country = $country;
        $applicantAddress->zip = $zip;
    
        try {
            $applicantAddress->save(); // Save the model instance
    
            return response()->json(['status' => 200, 'error' => '', 'data' => []]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }
}