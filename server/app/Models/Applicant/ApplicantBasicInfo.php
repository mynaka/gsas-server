<?php

namespace App\Models\Applicant;

use Illuminate\Database\Eloquent\Model;

class ApplicantBasicInfo extends Model {
    protected $table = 'applicant_basic_info';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'date_of_birth',
        'citizenship',
        'civil_status',
    ];

    // Define the relationship with ApplicantAcademicInfo
    public function academicInfo() {
        return $this->hasOne(ApplicantAcademicInfo::class);
    }

    //Define the relationship with Applicantddress
    public function address() {
        return $this->hasOne(ApplicantAddress::class);
    }

    public function contactInfo() {
        return $this->hasMany(ApplicantContactInfo::class);
    }

    public function employerInfo() {
        return $this->hasMany(ApplicantContactInfo::class);
    }

    public function orgMembershipInfo() {
        return $this->hasMany(ApplicantOrgMembershipInfo::class);
    }

    public function scholarshipInfo() {
        return $this->hasMany(ApplicantScholarshipInfo::class);
    }

    public function otherInfo() {
        return $this->hasOne(ApplicantOtherInfo::class);
    }

    public function publicationInfo() {
        return $this->hasMany(ApplicantPublicationInfo::class);
    }
}