<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 7/17/2019
 * Time: 3:07 PM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|min:3|max:50|unique:users',
            'email' => 'required|email|unique:users',
        ];
        if($this->user){
            $arr_validate['username'] = 'required|min:3|max:50|unique:users,username,'.$this->user;
            $arr_validate['email'] = 'required|email|unique:users,email,'.$this->user;
        }

        return $arr_validate;
    }
}