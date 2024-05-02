<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestigartionReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'intervewer_name' => ['required'],
            'interview_date' => ['required'],
            'intervewer_designation' => ['required'],
            'intervewer_contact_number' => ['required'],
            // 'suspected_name' => ['required'],
            // 'suspect_gender' => ['required'],
            // 'suspect_education' => ['required'],
            // 'suspect_address' => ['required'],
            // 'suspect_details' => ['required'],
            // 'respondent_name' => ['required'],
            // 'respondent_age' => ['required'],
            // 'respondent_contact' => ['required'],
            // 'respondent_address' => ['required'],
            // 'relationship_with_suspect' => ['required'],
            // 'healthcare_worker_facility_name' => ['required'],
            // 'specify_other_name' => ['required'],
            // 'suspect_contact_with_animals' => ['required'],
            // 'animal_die_in_10_days' => ['required'],
            // 'is_animal_tested_rabies' => ['required'],
            // 'is_animal_vaccinated' => ['required'],
            // 'treatment_applied_at_home' => ['required'],
            // 'sutures_applied_on_bite' => ['required'],
            // 'suspect_receive_vaccine' => ['required'],
            // 'patient_ever_been_vaccinated' => ['required'],
            // 'patient_received_tt_vaccine_post_exposure' => ['required'],
            // 'symptoms_exhibited_by_deceased' => ['required'],
            // 'date_of_onset_of_symptoms' => ['required'],
            // 'date_of_death' => ['required'],
            // 'where_did_deceased_die' => ['required'],
            // 'did_deceased_seek_medical_help' => ['required'],
            // 'name_of_hospital' => ['required'],
            // 'date_of_consultation' => ['required'],
            // 'mri_of_brain' => ['required'],
            // 'postmortem_done' => ['required'],
            // 'evidence_of_recent_wound' => ['required'],
            // 'evidence_of_healed_wound' => ['required'],
            // 'death_certificate' => ['required'],
            // 'cause_of_death' => ['required'],
            // 'similar_illness_in_community_past_12_months' => ['required'],
            // 'final_impression' => ['required'],
        ];
    }
}
