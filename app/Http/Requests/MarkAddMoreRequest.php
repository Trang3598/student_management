<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class MarkAddMoreRequest extends  FormRequest
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
        $rules=[];
        foreach($this->request->get('score') as $key => $val){
        $rules['score.'.$key] = 'required';
    }
    return $rules;
    }
    public function messages()
    {
        $messages = [];
        foreach($this->request->get('score') as $key => $val)
        {
            $messages['score.'.$key.'.max'] = 'Mark'.$key.'error';
        }
        return $messages;
    }
}
