<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class PostRequest extends FormRequest
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
            'password' => 'required',
            'content' => 'required|max:190',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'パスワードを入力してください',
            'content.required' => '投稿内容を入力してください',
            'content.max' => '投稿内容が190文字を超えています',
        ];
    }

    public function passwordCheck($param)
    {
        if (hash('md5', $param ) != config('app.admin_key')) {
            throw ValidationException::withMessages([
                'password' => 'パスワードが違います',
            ]);
        }
    }
}
