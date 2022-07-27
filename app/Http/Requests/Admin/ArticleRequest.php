<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|max:200',
            'description' => 'required',
            'body' => 'required',
            'category_id' => 'required|integer',
            'img' => 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Введіть назву статті",
            'title.max' => "Занадто довга назва",
            'description.required' => "Заповніть короткий опис статті",
            'body.required' => "Відсутній текст статті",
            'category_id.required' => "Виберіть категорію",
            'category_id.integer' => "Помилка категорії",
            'img.image' => "Файл повинен бути картинкою"
        ];

    }
}
