<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'title' => 'required',
            'episode' => 'required',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'title.required' => 'タイトルは必須項目です。',
            'episode.required' => 'エピソードは必須項目です。',
            'image.required' => '画像を選択してください。',
        ];
    }
}
