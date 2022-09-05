<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:category,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Введите текст',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Введите текст',
            'preview_image.required' => 'Это поле необходимо для заполнения',
            'main_image.required' => 'Это поле необходимо для заполнения',
            'preview_image.file' => 'Выберите файл',
            'main_image.file' => 'Выберите файл',
            'category_id.required' => 'Это поле необходимо для заполнения',
            'category_id.integer' => 'Id категории должно быть числом',
            'category_id.exists' => 'Id категории должно быть в БД',
        ];
    }
}
