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
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'phone' => ['nullable', 'string', 'max:255', 'regex:/^(\+7|8)\d{3}\d{3}\d{2}\d{2}$/'],
            'role' => 'nullable|integer',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'name.string' => 'Данное поле должно быть строкой',
            'name.max' => 'Максимальная длина данного поля не должна превышать :max символов',
            'email.string' => 'Данное поле должно быть строкой',
            'email.max' => 'Максимальная длина данного поля не должна превышать :max символов',
            'phone.string' => 'Данное поле должно быть строкой',
            'phone.max' => 'Максимальная длина данного поля не должна превышать :max символов',
            'phone.regex' => 'Введите номер телефона в следующем формате 89991231212 или +79991231212',
            'password.string' => 'Данное поле должно быть строкой',
            'role.integer' => 'Данное поле должно быть числом',
        ];
    }
}
