<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'q' => 'required|max:200|min:3'
        ];
    }

    public function messages()
    {
        return [
            'q.required' => "Введіть Ваш запит",
            'q.max' => "Занадто багато символів",
            'q.min' => "Мінімум 3 символи"
        ];

    }
}
