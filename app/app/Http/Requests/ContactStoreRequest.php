<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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
            'tel' => 'required',
            'message' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'tel.required' => '電話番号は必須です。',
            'message.required' => 'お問合せ内容は必須です。'
        ];
    }
}
