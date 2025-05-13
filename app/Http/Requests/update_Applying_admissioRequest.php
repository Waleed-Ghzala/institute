<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class update_Applying_admissioRequest extends FormRequest
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
            
            'first_desir'=>[ 'string', 'max:255'],
            'Second_desir'=>['string', 'max:255'],
            'third_desir'=>[ 'string', 'max:255'],
            'fourth_desir'=>[ 'string', 'max:255'],
            'fifth_desir'=>[ 'string', 'max:255'],
            'sixth_desir'=>[ 'string', 'max:255'],
            'score'=>[ 'string', 'max:255'],
            'copy_of_certificate'=>[ 'image'],
            ];
    }
}
