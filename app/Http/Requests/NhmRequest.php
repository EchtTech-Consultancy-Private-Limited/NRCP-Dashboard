<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhmRequest extends FormRequest
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
            'year' => 'required',
            'state' => 'required',
            'rops' => 'mimes:jpeg,bmp,png,gif,svg,pdf',
            'supplementary_rops' => 'mimes:jpeg,bmp,png,gif,svg,pdf,zip',
        ];
    }

    public function messages()
    {
        return [
            'year' => 'The year field is required',
            'state' => 'The state field is required',
            'rops' => 'Only PDF file required',
            'supplementary_rops' => 'Only PDF file required',
        ];
    }
}
