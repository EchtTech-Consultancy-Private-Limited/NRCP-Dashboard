<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LineSuspected extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'suspected_date',
        'name_of_health',
        'address_hospital',
        'designation_name',
        'type_of_health',
        'email',
        'name',
        'age',
        'sex',
        'contact_number',
        'village',
        'sub_district_mandal',
        'district',
        'biting_animal',
        'suspected_probable',
        'bit_incidence_village',
        'bit_incidence_sub_district',
        'bit_incidence_district',
        'category_of_bite',
        'status_of_pep',
        'health_facility_name_institute',
        'health_facility_district',
        'outcome_of_patient',
        'bite_from_stray',
        'mobile_number',
        'date'
    ];
}
