<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'string',
            'description' => 'string',
            'salary' => 'numeric',
            'company_name' => 'string',
            'location' => 'string',
            'category' => 'string',
            'type' => 'string'
        ];
    }

    public function messages()
    {
        return [
            'numeric' => 'The :attribute field must be a number.',
            'string' => 'The :attribute field must be a string.',
        ];
    }
}
