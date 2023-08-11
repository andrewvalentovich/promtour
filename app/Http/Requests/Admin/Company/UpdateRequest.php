<?php

namespace App\Http\Requests\Admin\Company;

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
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'video' => 'nullable|string',
            'category_id' => 'nullable',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Данное поле является обязательным для заполнения',
            'name.max' => 'Максимальная длина данного поля не должна превышать 255 символов',
            'name.string' => 'Данное поле должно быть строкой',
            'short_description.string' => 'Данное поле должно быть строкой',
            'description.string' => 'Данное поле должно быть строкой',
            'category_id.integer' => 'Данное поле должно быть числом',
            'category_id.min' => 'Данное поле должно быть больше :min',
            'category_id.max' => 'Данное поле должно быть меньше :max',
            'video.string' => 'Данное поле должно быть строкой',
        ];
    }
}
