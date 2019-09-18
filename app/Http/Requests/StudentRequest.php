<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        return[
            'name'=>'required|min:3|max:100',
            'class_code'=>'required',
            'gender'=>'required',
            'birthday' => 'required|date|date_format:Y-m-d|after:1-1-1990|before:31-12-2001',
            'image' => 'required',
            'phone' => 'required|numeric|unique:students,phone',
            'username' => 'required|unique:users,username',
            'email'=> 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required',
        ];
    }
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }
}
