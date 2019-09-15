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
        $array_validate['score.*'] = 'required|numeric|between:0,10';
        $array_validate['student_code.*'] = 'required';
        $array_validate['subject_code.*'] = 'required|';
        return $array_validate;
    }
}
