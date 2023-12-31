<?php

namespace App\Http\Requests\Admin\Booking;

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
            'booking_date' => 'nullable|string|max:10',
            'booking_time' => 'nullable|string|max:8',
            'participants_count' => 'nullable|integer|max:3',
            'user_id' => 'nullable|integer',
            'excursion_id' => 'nullable|integer',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'booking_date.string' => 'Данное поле должно быть строкой',
            'booking_date.max' => 'Максимальная длина данного поля не должна превышать :max символов',
            'booking_time.string' => 'Данное поле должно быть строкой',
            'booking_time.max' => 'Максимальная длина данного поля не должна превышать :max символов',
            'participants_count.integer' => 'Данное поле должно быть строкой',
            'participants_count.max' => 'Максимальная длина данного поля не должна превышать :max символов',
            'user_id.integer' => 'Данное поле должно быть строкой',
            'excursion_id.integer' => 'Данное поле должно быть строкой',
        ];
    }
}
