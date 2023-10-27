<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantAcademicInfo extends Model
{
    protected $table = 'applicant_academic_info'; // Specify the table name

    protected $fillable = [
        'applicant_id',
        'institution_name',
        'degree_level',
        'degree_received',
        'year_received',
        'specialization_major',
    ];
}
