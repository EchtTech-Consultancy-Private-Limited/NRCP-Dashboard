<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateMonthlyRequest extends FormRequest
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
            'state_name' => ['required'],
            'state_nodal_office' => ['required'],
            'office_address' => ['required'],
            'reporting_month_year' => ['required'],
        ];
    }
}
