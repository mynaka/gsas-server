<?php

namespace App\Models\Applicant;

use Illuminate\Database\Eloquent\Model;

class ApplicantContactInfo extends Model {
    protected $table = 'applicant_contact_info';

    protected $fillable = [
        'applicant_basic_info_id',
        'type',
        'details'
    ];

    public function applicantBasicInfo() {
        return $this->belongsTo(ApplicantBasicInfo::class, 'applicant_basic_info_id', 'id');
    }
}
