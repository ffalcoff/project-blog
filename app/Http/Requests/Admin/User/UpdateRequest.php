<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->user->id,
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Введите текст',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Введите текст',
            'email.email' => 'Ваша почта должна соответствовать формату example@mail.ru',
            'email.unique' => 'Пользователь с таким мылом уже существует',
        ];
    }
}
