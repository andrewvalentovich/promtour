<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'phone' => ['required', 'string', 'max:255', 'unique:users,phone', 'regex:/^(\+7|8)\d{3}\d{3}\d{2}\d{2}$/'],
            'password' => 'required|string|confirmed',
            'role' => 'nullable|integer',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Данное поле является обязательным для заполнения',
            'name.string' => 'Данное поле должно быть строкой',
            'name.max' => 'Максимальная длина данного поля не должна превышать :max символов',
            'email.required' => 'Данное поле является обязательным для заполнения',
            'email.string' => 'Данное поле должно быть строкой',
            'email.max' => 'Максимальная длина данного поля не должна превышать :max символов',
            'email.unique' => 'Пользователь с такой почтой уже существует',
            'phone.required' => 'Данное поле является обязательным для заполнения',
            'phone.string' => 'Данное поле должно быть строкой',
            'phone.max' => 'Максимальная длина данного поля не должна превышать :max символов',
            'phone.unique' => 'Пользователь с таким номером телефона уже существует',
            'phone.regex' => 'Введите номер телефона в следующем формате 89991231212 или +79991231212',
            'password.required' => 'Данное поле является обязательным для заполнения',
            'password.string' => 'Данное поле должно быть строкой',
            'password.confirmed' => 'Подтвердите пароль',
            'role.integer' => 'Данное поле должно быть числом',
        ];
    }
}
