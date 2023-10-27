<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantAddress extends Model{
    protected $table = 'applicant_address'; // Set the table name

    protected $fillable = [
        'applicant_id',
        'address_type',
        'street_address',
        'town_city',
        'province_state',
        'country',
        'zip',
        // Add any other columns you need
    ];
}
