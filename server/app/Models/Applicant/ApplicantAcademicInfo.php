<?php

namespace App\Models\Applicant;

use Illuminate\Database\Eloquent\Model;

class ApplicantAcademicInfo extends Model {
    protected $table = 'applicant_academic_info';

    protected $fillable = [
        'applicant_basic_info_id',
        'institution_name',
        'degree_level',
        'degree_received',
        'year_received',
        'specialization_major',
    ];

    // Define the relationship with ApplicantBasicInfo
    public function applicantBasicInfo() {
        return $this->belongsTo(ApplicantBasicInfo::class, 'applicant_basic_info_id', 'id');
    }
}