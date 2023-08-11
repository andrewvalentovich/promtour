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
            'price' => 'required|integer|min:0|max:99999999999',
            'age_limit' => 'nullable|integer|min:0|max:9999',
            'active_days_for_booking' => 'required|integer|min:0|max:365',
            'max_participants_count_group' => 'required|integer',
            'max_participants_count_client' => 'required|integer',
            'duration' => 'required|string|max:8',
            'days_off' => 'required|string',
            'schedule.*' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer|min:0|max:10',
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
            'active_days_for_booking.required' => 'Данное поле является обязательным для заполнения',
            'active_days_for_booking.integer' => 'Данное поле должно быть числом',
            'active_days_for_booking.min' => 'Минимальное значение данного поля составляет :min',
            'active_days_for_booking.max' => 'Максимальное значение данного поля составляет :max',
            'price.required' => 'Данное поле является обязательным для заполнения',
            'price.integer' => 'Данное поле должно быть числом',
            'price.min' => 'Минимальное значение данного поля составляет :min',
            'price.max' => 'Максимальное значение данного поля составляет :max',
            'age_limit.integer' => 'Данное поле должно быть числом',
            'age_limit.min' => 'Минимальное значение данного поля составляет :min',
            'age_limit.max' => 'Максимальное значение данного поля составляет :max',
            'max_participants_count_group.required' => 'Данное поле является обязательным для заполнения',
            'max_participants_count_group.integer' => 'Данное поле должно быть числом',
            'max_participants_count_group.max' => 'Максимальная длина данного поля не должна превышать 6 символов',
            'max_participants_count_client.required' => 'Данное поле является обязательным для заполнения',
            'max_participants_count_client.integer' => 'Данное поле должно быть числом',
            'max_participants_count_client.max' => 'Максимальная длина данного поля не должна превышать 6 символов',
            'duration.required' => 'Данное поле является обязательным для заполнения',
            'duration.string' => 'Данное поле должно быть строкой',
            'duration.max' => 'Максимальная длина данного поля не должна превышать 8 символов',
            'days_off.required' => 'Данное поле является обязательным для заполнения',
            'days_off.string' => 'Данное поле должно быть строкой',
            'schedule.*.string' => 'Данное поле должно быть строкой',
            'schedule.*.max' => 'Максимальная длина данного поля не должна превышать 255 символов',
            'category_id.integer' => 'Данное поле должно быть числом',
            'category_id.min' => 'Данное поле должно быть больше :min',
            'category_id.max' => 'Данное поле должно быть меньше :max',
        ];
    }
}
