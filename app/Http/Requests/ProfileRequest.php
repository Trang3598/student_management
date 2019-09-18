<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'=>'required|min:3|max:100',
            'class_code'=>'required',
            'gender'=>'required',
            'birthday' => 'required|date|date_format:Y-m-d|after:1-1-1990|before:31-12-2001',
            'phone' => 'numeric|unique:students,phone,'.$this->route('student'),
            'address'=>'required',
            'image' =>'max:2000',
        ];
    }
}
