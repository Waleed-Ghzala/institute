<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class advertisementsRequest extends FormRequest
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
            'type'=>['required','string'],
        'advertisement_Content' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf,docx', 'max:2048']   ,
                 'date'=>['required','date'],
        ];
    }
}
