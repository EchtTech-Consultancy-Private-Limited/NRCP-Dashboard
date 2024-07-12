<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateMonthlyReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id',
        'state_nodal_office',
        'office_address',
        'reporting_month_year',
        'total_districts',
        'total_health_facilities_anaimal_bite',
        'total_health_facilities_submitted_monthly',
        'total_patients_animal_biting',
        'total_stray_dog_bite',
        'total_pet_dog_bite',
        'total_cat_bite',
        'total_monkey_bite',
        'total_others_bite',
        'mention_patient_cateogry_I',
        'mention_patient_cateogry_II',
        'mention_patient_cateogry_III',
        'rabies_vaccination_im_route',
        'rabies_vaccination_id_route',
        'rabies_vaccination_III_victim_ars',
        'rabies_vaccination_completed_pep',
        'confirmed_suspected_rabies_deaths',
        'suspected_rabies_cases_opd',
        'suspected_rabies_cases_admitted',
        'suspected_rabies_cases_left_against_medical',
        'suspected_rabies_deaths',
        'arv_opening_balance',
        'arv_quantity_received',
        'arv_quantity_utilized',
        'arv_closing_balance',
        'shortage_of_arv',
        'ars_opening_balance',
        'ars_quantity_recieved',
        'ars_quantity_utilized',
        'ars_closing_balance',
        'shortage_of_ars',
        'dh_health_of_health_facilties',
        'dh_of_arv',
        'dh_of_ars',
        'sdh_health_of_health_facilties',
        'sdh_of_arv',
        'sdh_of_ars',
        'chc_health_of_health_facilties',
        'chc_of_arv',
        'chc_of_ars',
        'phc_health_of_health_facilties',
        'phc_of_arv',
        'phc_of_ars',
        'bite_cases_shared_department',
        'bite_cases_observed',
        'other_remarks',
    ];
    
    /**
     * states
     *
     * @return void
     */
    public function states(){
        return $this->belongsTo(State::class,'state_id');
    }
}
