<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequestForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow authorized users to make this request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            // Rules for Input field validation
            'name' => ['required', 'string', 'max:200'],
            'slug' => ['required', 'string', 'max:200'],
            'navbar_status' => ['nullable'],
            'status' => ['nullable'],
        ];



        return $rules;
    }
}
