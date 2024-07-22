<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StateUserLFormCountCase extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'state_user_l_forms_id',
        'lform_state_id',
        'lform_district_id',
        'fname',
        'mname',
        'lname',
        'aadhar_number',
        'age',
        'sex',
        'contact_number',
        'lform_subdistrict',
        'lform_village',
        'lform_biting_animal',
        'lform_speciman_type',
        'lform_speciman_detail',
        'lform_sample_collection_date',
        'number_of_test_performed',
        'lform_result',
        'lform_result_declaration_date',
        'lform_remark',
    ];

    /**
     * @states
     *
     * @return void
     */
    public function states()
    {
        return $this->belongsTo(CountryState::class, 'lform_state_id');
    }

    /**
     * @City
     *
     * @return void
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'lform_district_id');
    }

    public function lform()
    {
        return $this->belongsTo(StateUserLForm::class, 'state_user_l_forms_id');
    }
}
