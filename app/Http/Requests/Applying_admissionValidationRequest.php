<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Applying_admissionValidationRequest extends FormRequest
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
        return[
            
'first_desir_code'=>['required', 'string', 'max:255'],
'Second_desir_code'=>['string', 'max:255'],
'third_desir_code'=>[ 'nullable','string', 'max:255'],
'fourth_desir_code'=>[ 'nullable','string', 'max:255'],
'fifth_desir_code'=>[ 'nullable','string', 'max:255'],
'sixth_desir_code'=>[ 'nullable','string', 'max:255'],
'score'=>['required', 'string', 'max:255'],
'copy_of_certificate' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
];
    }
}
