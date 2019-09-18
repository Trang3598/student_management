<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequestEdit extends FormRequest
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
        $student_id = $this->request->get('student_id');
        return [
            'name'=>'required|min:3|max:100',
            'class_code'=>'required',
            'gender'=>'required',
            'birthday' => 'required|date|date_format:Y-m-d|after:1-1-1990|before:31-12-2001',
            'phone' => 'required|numeric|unique:students,phone,'.$student_id,
            'address'=>'required',
            'image' =>'max:2000',
        ];
    }
    public function messages()
    {
        return [

        ];
    }
}
