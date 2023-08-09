<?php

namespace App\Http\Requests\Admin\Excursion;

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
            'description' => 'nullable|string',
            'active_days_for_booking' => 'nullable|integer',
            'price' => 'nullable|integer',
            'max_participants_count_group' => 'nullable|integer',
            'max_participants_count_client' => 'nullable|integer',
            'duration' => 'nullable|string',
            'schedule.*' => 'nullable|string|max:255',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'name.string' => 'Данное поле должно быть строкой',
            'name.max' => 'Максимальная длина данного поля не должна превышать 255 символов',
            'description.string' => 'Данное поле должно быть строкой',
            'active_days_for_booking.integer' => 'Данное поле должно быть числом',
            'price.integer' => 'Данное поле должно быть числом',
            'max_participants_count_group.integer' => 'Данное поле должно быть числом',
            'max_participants_count_client.integer' => 'Данное поле должно быть числом',
            'duration.string' => 'Данное поле должно быть строкой',
            'schedule.string' => 'Данное поле должно быть строкой',
            'schedule.*.string' => 'Данное поле должно быть строкой',
            'schedule.*.max' => 'Максимальная длина данного поля не должна превышать 255 символов',
        ];
    }
}