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
        $arr_validate = [
            'name' => 'required|min:5',
            'birthday' => 'required|date|before:now',
//            'image' => 'mimes:jpeg,bmp,png|required',
            'phone' => ['required','numeric','regex:/(^0[3|7|8|9][0-9]{8}$)/u'],
            'gender' => 'required',
            'class_code' => 'required'
        ];
        if (!$this->student){
            $arr_validate['username'] = 'required|min:5|unique:users';
            $arr_validate['password'] = 'required|min:5|required_with:confirm|same:confirm';
            $arr_validate['confirm'] = 'required|min:5|same:password';
            $arr_validate['email'] = 'required|email|unique:users';
        }
        return $arr_validate;
    }
}
