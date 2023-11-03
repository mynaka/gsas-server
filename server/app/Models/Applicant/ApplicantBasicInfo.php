<?php

namespace App\Models\Applicant;

use Illuminate\Database\Eloquent\Model;

class ApplicantBasicInfo extends Model
{
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
}