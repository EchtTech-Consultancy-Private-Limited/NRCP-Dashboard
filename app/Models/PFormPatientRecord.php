<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PFormPatientRecord extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'country_code',
        'citizenship',
        'pform_state',
        'pform_city',
        'mobile_number',
        'first_name',
        'middle_name',
        'last_name',
        'birth_of_date',
        'gender',
        'id_type',
        'identification_number',
        'taluka',
        'village',
        'house_no',
        'street_name',
        'landmark',
        'pincode',
        'provisinal_diagnosis',
        'date_of_onset',
        'opd_ipd',
        'test_suspected',
        'type_of_sample',
        'test_resquested',
        'sample_date',
    ];
        
    /**
     * country
     *
     * @return void
     */
    public function country()
    {
        return $this->belongsTo(Country::class,'country_code');
    }
    
    /**
     * state
     *
     * @return void
     */
    public function state()
    {
        return $this->belongsTo(CountryState::class,'pform_state');
    }
    
    /**
     * city
     *
     * @return void
     */
    public function city()
    {
        return $this->belongsTo(City::class,'pform_city');
    }
}
