<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname', 'first_name', 'middle_name', 'extension', 'date_of_birth', 'place_of_birth', 'citizenship',
        'sex', 'civil_status', 'height', 'weight', 'blood_type', 
        'gsis_id_no', 'pag_ibig_id_no', 'philhealth_no', 'sss_no', 'tin_no',
        'agency_employee_no', 'telephone_no', 'mobile_no', 'email_address',
        'residential_address', 'permanent_address',
        'spouse_surname', 'spouse_first_name', 'spouse_middle_name', 'spouse_occupation',
        'spouse_employer', 'spouse_business_address', 'spouse_telephone_no',
        'father_surname', 'father_first_name', 'father_middle_name',
        'mother_maiden_name', 'mother_first_name', 'mother_middle_name',
        'elementary_name_school', 'elementary_basic_education', 'elementary_from_school',
        'elementary_to_school', 'elementary_highest_level', 'elementary_year_graduate',
        'elementary_scholarship', 'secondary_name_school', 'secondary_basic_education',
        'secondary_from_school', 'secondary_to_school', 'secondary_highest_level',
        'secondary_year_graduate', 'secondary_scholarship',
        'college_education',
        'children'
    ];

    protected $casts = [
        'children' => 'array',
        'college_education' => 'array'
    ];
}