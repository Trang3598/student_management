<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequestEdit extends FormRequest
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
            'name'=> 'required|min:3|max:100|unique:subjects,name,'.$this->route('subject'),
            'number'=>'required',
            ];
    }
    public function messages()
    {
        return [
            'name.required'=>'NoName',
            'name.min'=>'Min 3',
            'name.max'=>'Max 100',
            'name.unique'=>'Error: Same Name',
            'number.required'=>'NO NUMBER'
        ];
    }
}