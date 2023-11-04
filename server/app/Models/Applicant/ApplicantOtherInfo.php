<?php

namespace App\Models\Applicant;

use Illuminate\Database\Eloquent\Model;

class ApplicantOtherInfo extends Model {
    protected $table = 'applicant_other_info';

    protected $fillable = [
        'applicant_basic_info_id',
        'has_applied',
        'result',
        'date_of_result',
    ];

    public function applicantBasicInfo() {
        return $this->belongsTo(ApplicantBasicInfo::class, 'applicant_basic_info_id', 'id');
    }
}
