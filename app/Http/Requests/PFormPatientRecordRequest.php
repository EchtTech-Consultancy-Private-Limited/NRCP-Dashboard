<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PFormPatientRecordRequest extends FormRequest
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
            'country_code' => 'required',
            'mobile_number' => 'required|numeric|min_digits:10|max_digits:10',
            'first_name' => 'required',            
            'last_name' => 'required',
            'birth_of_date' => 'required',
            'gender' => 'required',            
            'id_type' => 'required',
            'identification_number' => 'required',
            'gender' => 'required',            
            'id_type' => 'required',
            'identification_number' => 'required',
            'pform_state' => 'required',
            'pform_city' => 'required',
            'village' => 'required',
            'house_no' => 'required',
            'provisinal_diagnosis' => 'required',
            'date_of_onset' => 'required',
            'opd_ipd' => 'required',
            'test_suspected' => 'required',
            'type_of_sample' => 'required',
            'test_resquested' => 'required',
            'sample_date' => 'required',
            'taluka' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'country_code' => 'Please select a country',
            'mobile_number.required' => 'Mobile Number 10 Digit Required',
        ];
    }
}
