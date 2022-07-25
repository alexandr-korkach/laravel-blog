<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
{

    protected function getRedirectUrl()
    {
        return parent::getRedirectUrl() . '#comments';
    }
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
            'message' => 'required|max:500|min:3',
            'article_id' => 'required|numeric|exists:App\Models\Article,id'
        ];
    }

    public function messages()
    {
        return [
            'message.required' => "Введіть комментар",
            'message.max' => "Занадто багато символів",
            'message.min' => "Мінімум 3 символи"
        ];

    }


}
