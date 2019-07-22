<?php

namespace App\Http\Requests;

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
        if (!empty($this->id)) {
            $nameRule = sprintf('required|unique:classes,name,%s|min:3|max:100', $this->id);
        } else {
            $nameRule = 'required|unique:classes,name|min:3|max:100';
        }

        return [
            'name' => $nameRule,
            'faculty_id' => 'required'
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
            'name.required' => 'NoName',
            'name.min' => 'Min 3',
            'name.max' => 'Max 100',
            'name.unique' => 'Error -> Same Name',
            'faculty_id.required' => 'No Faculty',
        ];
    }
}
