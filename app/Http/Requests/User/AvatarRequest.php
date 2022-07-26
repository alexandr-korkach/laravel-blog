<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AvatarRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'avatar' => 'required|image|max:5000'
        ];
    }

    public function messages()
    {
        return [
            'avatar.required' => "Виберіть файл зображення",
            'avatar.image' => "Невірний тип файлу, потрібне зображення (jpg, jpeg, png, bmp, gif, svg, або webp)",
            'avatar.size' => "Занадто великий файл (не більше 5 мб)"
        ];

    }

    protected function getRedirectUrl()
    {
        return parent::getRedirectUrl() . '#profile';
    }
}
