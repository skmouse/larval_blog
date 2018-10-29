<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
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
            'email'=> 'required',
            'password'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '请输入邮箱',
            'password.required' => '请输入密码',
        ];
    }
}
