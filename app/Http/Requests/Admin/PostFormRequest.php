<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        $rules = [
            'name' => ['required','string'],
<<<<<<< HEAD
            'subcategory' => ['required'],
            'category_id'=> ['required','integer'],
=======
            'category_id'=> ['required','integer'],
            'subcategory_id' => ['required','integer'],
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
            'slug'=> ['required','string'],
            'description' => ['required'],
            'yt_iframe'=>['nullable','string'],
            'meta_title'=>['string','required'],
            'meta_description'=>['string','nullable'],
            'meta_keyword'=>['string','nullable'],
            'status'=>'nullable',

        ];

        return $rules;
    }
}
