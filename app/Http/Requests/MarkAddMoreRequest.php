<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class MarkAddMoreRequest extends FormRequest
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
        $rules = [];

        foreach ($this->request->get('score') as $key => $val) {
            $rules['score.' . $key] = 'required|numeric|max:10|min:0';
        }
        foreach ($this->request->get('subject_code') as $key1 => $val1) {
            $rules['subject_code.' . $key1] = 'required';
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [];
        foreach ($this->request->get('score') as $key => $val) {
            $messages['score.' . $key . '.max'] = sprintf(__('messages.failRow').' %d '.__('messages.lessThan').' 10',$key+1);
            $messages['score.' . $key . '.required'] = sprintf(__('messages.failRow').' %d '.__('messages.notEnter'),$key+1);
            $messages['score.' . $key . '.min'] = sprintf(__('messages.failRow').' %d '.__('messages.betterThan').' 0',$key+1);
            $messages['score.' . $key . '.numeric'] = sprintf(__('messages.failRow').' %d '.__('messages.isNumber'),$key+1);
        }
        foreach ($this->request->get('subject_code') as $key1 => $val1) {
            $messages['subject_code.' . $key1 . '.required'] = sprintf(__('messages.failRow').' %d '.__('messages.noChooseSubject'),$key1+1);
        }
        return $messages;
    }
}
