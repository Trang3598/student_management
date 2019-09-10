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
            $messages['score.' . $key . '.max'] = sprintf('Loi tai dong so %d ,diem khong the lon hon 10 ',$key+1);
            $messages['score.' . $key . '.required'] = sprintf('Loi tai dong so %d ,chua nhap diem ',$key+1);
            $messages['score.' . $key . '.min'] = sprintf('Loi tai dong so %d, diem phai lon hon 0 ',$key+1);
            $messages['score.' . $key . '.numeric'] = sprintf('Loi tai dong so %d,diem phai la so ',$key+1);
        }
        foreach ($this->request->get('subject_code') as $key1 => $val1) {
            $messages['subject_code.' . $key1 . '.required'] = sprintf('Loi tai dong so %d, chua chon mon hoc ',$key1+1);
        }
        return $messages;
    }
}
