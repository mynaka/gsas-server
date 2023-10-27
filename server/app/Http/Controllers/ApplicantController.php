<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade

class ApplicantAcademicInfoController extends Controller
{
    public function createApplicantAcademicInfoMany(Request $request)
    {
        $applicant_id = $request->input('applicant_id');
        $institution_name = $request->input('institution_name');
        $degree_level = $request->input('degree_level');
        $degree_received = $request->input('degree_received');
        $year_received = $request->input('year_received');
        $specialization_major = $request->input('specialization_major');

        $query = "
        INSERT INTO applicant_academic_info(applicant_id, institution_name, degree_level, degree_received, year_received, specialization_major) 
        VALUES (
            (SELECT applicant_id FROM basic_applicant_info WHERE applicant_id = ?),
            ?, ?, ?, ?
        )";

        try {
            DB::insert($query, [$applicant_id, $institution_name, $degree_level, $degree_received, $year_received, $specialization_major]);

            return response()->json(['status' => 200, 'error' => '', 'data' => []]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }
}
