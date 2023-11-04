<?php

namespace App\Models\Applicant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantRefereeInfo extends Model {
    protected $table = 'applicant_referee_info';

    protected $fillable = [
        'applicant_basic_info_id',
        'name',
        'email',
        'type',
    ];

    public function applicantBasicInfo() {
        return $this->belongsTo(ApplicantBasicInfo::class, 'applicant_basic_info_id', 'id');
    }
}