<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'user' => 'required|unique:users,user,'.$this->user,
            'email' => 'required|email|unique:users,email,'.$this->user,
        ];
    }

    public function messages()
    {
        return[
            'user.unique'=>'Same User',
            'email.required'=>'No Email',
            'email.unique' => 'Same Email',
            'email.email' => 'ERROR Email'
        ];
    }
}
