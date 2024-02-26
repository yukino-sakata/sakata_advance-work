<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservedRequest extends FormRequest
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
    public function rules(){
        return [
            'date' => 'required|after:today'
        ];
    }

    public function messages()
{
    return [
        'date.required' => '日付を選択してください',
        'date.after' => '過去の日付は選択できません',
    ];
}
}
