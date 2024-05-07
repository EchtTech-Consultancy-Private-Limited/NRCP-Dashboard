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
            'name_of_health' => ['required'],
            'address_hospital' => ['required'],
            'email' => ['required'],
            'type_of_health' => ['required'],
        ];
    }
}
