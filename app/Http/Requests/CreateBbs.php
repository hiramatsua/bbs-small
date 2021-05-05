<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBbs extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            'title' => 'required|max:20',   // ★入力必須、20文字以内
            'body' => 'required|max:100',   // ★入力必須、100文字以内
        ];
    }

    public function attributes()
    {
        // 日本語表示する
        return [
            'title' => 'タイトル',
            'body' => '本文',
        ];
    }
}
