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
            'interviewer_name' => ['required'],
            'interview_date' => ['required'],
            'interviewer_designation' => ['required'],
            'interviewer_contact_number' => ['required', 'numeric', 'digits:10'],            
        ];
    }
}
