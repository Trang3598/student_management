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
            //
            'name' => 'required|min:5',
            'birthday' => 'required|date|before:now',
            'image' => 'mimes:jpeg,bmp,png|required',
            'phone' => 'required|numeric',
            'gender' => 'required'
        ];
        if (!$this->get('id')) {
            $arr_validate['name'] = 'required|max:50|min:5';
            $arr_validate['birthday'] = 'required|date|before:now';
            $arr_validate['image'] = 'mimes:jpeg,bmp,png|required';
           $arr_validate['phone'] = 'required|numeric|';
        }
        return $arr_validate;
    }
}
