<?php

namespace App\Http\Requests\Admin\HowToBook;

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
            'title' => 'nullable|string|max:2048',
            'content' => 'nullable|string',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'title.string' => 'Данное поле должно быть строкой',
            'title.max' => 'Максимальная длина данного поля не должна превышать :max символов',
            'content.text' => 'Данное поле должно быть строкой',
        ];
    }
}
