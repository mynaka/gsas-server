<?php

namespace App\Models\Applicant;

use Illuminate\Database\Eloquent\Model;

class ApplicantEmployerInfo extends Model {
    protected $table = 'applicant_employer_info';

    protected $fillable = [
        'applicant_basic_info_id',
        'position',
        'institution',
        'street_address',
        'town_city',
        'province_state',
        'country',
        'zip',
        'employer_contact_number',
        'employer_email',
        'date_start',
        'date_end',
    ];

    public function applicantBasicInfo() {
        return $this->belongsTo(ApplicantBasicInfo::class, 'applicant_basic_info_id', 'id');
    }
}