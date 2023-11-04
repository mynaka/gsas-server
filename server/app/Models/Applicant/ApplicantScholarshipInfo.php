<?php

namespace App\Models\Applicant;

use Illuminate\Database\Eloquent\Model;

class ApplicantScholarshipInfo extends Model {
    protected $table = 'applicant_scholarship_info';

    protected $fillable = [
        'applicant_basic_info_id',
        'institution',
        'position',
        'date_start',
        'date_end',
    ];

    public function applicantBasicInfo() {
        return $this->belongsTo(ApplicantBasicInfo::class, 'applicant_basic_info_id', 'id');
    }
}