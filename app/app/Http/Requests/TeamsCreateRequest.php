<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamsCreateRequest extends FormRequest
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
            'team_icon' => 'required',
            'team_name' => 'required',
            'area' => 'required',
            'level' => 'required',
            'time' => 'required',
            'profile' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'team_icon.required' => 'チームアイコンを選択してください。',
            'team_name.required' => 'チーム名は必須項目です。',
            'area.required' => 'エリアを選択してください。',
            'level.required' => 'レベルを選択してください。',
            'time.required' => '時間帯を選択してください。',
            'profile.required' => 'プロフィールは必須です。'
        ];
    }
}
