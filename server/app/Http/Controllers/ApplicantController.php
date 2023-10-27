<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantAcademicInfo; // Import the model

class ApplicantController extends Controller
{
    public function createApplicantAcademicInfoMany(Request $request)
    {
        $data = $request->only([
            'applicant_id',
            'institution_name',
            'degree_level',
            'degree_received',
            'year_received',
            'specialization_major',
        ]);

        try {
            ApplicantAcademicInfo::create($data);

            return response()->json(['status' => 200, 'error' => '', 'data' => []]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }
}
