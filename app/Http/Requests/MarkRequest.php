<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_code'=>'required',
            'subject_code'=>'required',
            'score'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'student_code.required'=>'No Student',
            'subject_code.required'=>'No Subject',
            'score'=>'No Mark',
        ];
    }
}
