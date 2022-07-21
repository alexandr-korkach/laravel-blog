<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:255|min:3',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|max:50|confirmed',
            'check' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Введіть Ваше ім'я",
            'name.max' => "Ім'я не більше 255 символів",
            'name.min' => "Ім'я не менше 3 символів",
            'email.required' => 'Введіть Вашу електронну пошту',
            'email.max' => 'Невірний формат електронної пошти',
            'email.email' => 'Невірний формат електронної пошти',
            'email.unique' => 'Дана електронна адреса уже використовується',
            'password.required' => 'Введіть пароль',
            'password.max' => 'Занадто багато символів в паролі',
            'password.confirmed' => 'Паролі не співпадають',
            'check.required' => 'Ви не погодились з правилами',
        ];

    }
}
