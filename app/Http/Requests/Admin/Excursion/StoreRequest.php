<?php

namespace App\Http\Requests\Admin\Excursion;

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
            'description' => 'required|string',
            'price' => 'required|integer',
            'max_participants_count_group' => 'required|integer',
            'max_participants_count_client' => 'required|integer',
            'duration' => 'required|integer',
            'days_off' => 'required|string',
            'schedule.*' => 'nullable|string|max:255',
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
            'name.max' => 'Максимальная длина данного поля не должна превышать 255 символов',
            'description.required' => 'Данное поле является обязательным для заполнения',
            'description.string' => 'Данное поле должно быть строкой',
            'price.required' => 'Данное поле является обязательным для заполнения',
            'price.integer' => 'Данное поле должно быть числом',
            'price.max' => 'Максимальная длина данного поля не должна превышать 10 символов',
            'max_participants_count_group.required' => 'Данное поле является обязательным для заполнения',
            'max_participants_count_group.integer' => 'Данное поле должно быть числом',
            'max_participants_count_group.max' => 'Максимальная длина данного поля не должна превышать 6 символов',
            'max_participants_count_client.required' => 'Данное поле является обязательным для заполнения',
            'max_participants_count_client.integer' => 'Данное поле должно быть числом',
            'max_participants_count_client.max' => 'Максимальная длина данного поля не должна превышать 6 символов',
            'duration.required' => 'Данное поле является обязательным для заполнения',
            'duration.integer' => 'Данное поле должно быть числом',
            'days_off.required' => 'Данное поле является обязательным для заполнения',
            'days_off.string' => 'Данное поле должно быть строкой',
            'schedule.*.string' => 'Данное поле должно быть строкой',
            'schedule.*.max' => 'Максимальная длина данного поля не должна превышать 255 символов',
        ];
    }
}
