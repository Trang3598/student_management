<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
        $array_validate = [
            //
            'name' => 'required|min:2|max:50|unique:subjects',
            'number' =>'required|numeric|between:0,5'
        ];
        if(!$this->get('id')){
            $array_validate[ 'name'] = 'required|min:2|max:50';
            $array_validate[ 'number'] = 'required|numeric|between:0,5' ;
        }
        return $array_validate;
    }
}
