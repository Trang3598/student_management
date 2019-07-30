<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentSubjectRequest extends FormRequest
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
            'score.*' => 'required|numeric|between:0,10',
            'student_code.*' => 'required',
            'subject_code.*' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'student_code.required' => 'You have not selected any students',
           'subject_code.required' => 'You have not selected any subjects'

        ];
    }
}
