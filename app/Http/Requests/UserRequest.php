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
        return [
            //
            'name' =>'required|min:3|max:50',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:5|max:10',
            'level' => 'required'
        ];
    }
}