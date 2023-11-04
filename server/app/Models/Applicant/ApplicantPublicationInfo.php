<?php

namespace App\Models\Applicant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantPublicationInfo extends Model {
    protected $table = 'applicant_publication_info';

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
