<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequestEdit extends FormRequest
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
            'name'=>'required|unique:classes,name|min:3|max:100',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'No Class Name',
            'name.min' => 'Min 3',
            'name.max' => 'Max 100',
            'name.unique' => 'Error -> Same Name',
        ];
    }
}
