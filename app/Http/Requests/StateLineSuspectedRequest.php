<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateLineSuspectedRequest extends FormRequest
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
            'name_of_health' => ['required', 'regex:/^[a-zA-Z. \'\'-]+$/', 'min:2', 'max:150'],
            'address_hospital' => 'required',
            'email' => 'required',
            'main_contact_number' => 'required',
            'suspected_date' => 'required',
            'designation_name' => 'required','regex:/^[a-zA-Z. \'\'-]+$/','min:2', 'max:150',
            'main_contact_number' => 'required|unique:line_suspecteds,contact_number|numeric|digits:10',
            // 'aadhar_number' => 'required|unique:line_suspecteds,aadhar_number|numeric|digits:12',
            'type_of_health' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'designation_name.required' => 'Name & Designation field is required.',
            'main_contact_number.required' => 'The contact number field is required.'
        ];
    }

}
