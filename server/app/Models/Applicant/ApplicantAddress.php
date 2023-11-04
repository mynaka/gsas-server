<?php

namespace App\Models\Applicant;

use Illuminate\Database\Eloquent\Model;

class ApplicantAddress extends Model {
    protected $table = 'applicant_address';

    protected $fillable = [
        'applicant_basic_info_id',
        'address_type',
        'street_address',
        'town_city',
        'province_state',
        'country',
        'zip',
    ];

    // Define the relationship with ApplicantBasicInfo
    public function applicantBasicInfo() {
        return $this->belongsTo(ApplicantBasicInfo::class, 'applicant_basic_info_id', 'id');
    }
}