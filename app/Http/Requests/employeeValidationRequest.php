<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class employeeValidationRequest extends FormRequest
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
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required','string','email','max:255','unique:users','unique:pending_students'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string'],
            'Mobile_number'=>['required', 'digits_between:10,15', 'numeric'],
           'birth_date'=>['required', 'date', 'before:today'],
           'employe_type'=>['required'],
           '_administrative_department_id'=>['required'],
             // 'role'=>['required']
        ];
    }
}
