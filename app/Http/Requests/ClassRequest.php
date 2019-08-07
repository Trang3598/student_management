<?php

namespace App\Http\Requests;

use App\ClassModel;
use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
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
            'faculty_id' => 'required',
            'name' => 'required|max:50|min:3|unique:classes'
        ];
        if ($this->class) {
            $arr_validate['faculty_id'] = 'required';
            $arr_validate['name'] = 'required|max:50|min:3';
        }
        return $arr_validate;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
}
