<?php

namespace App\Http\Requests\Admin\Booking;

use Illuminate\Foundation\Http\FormRequest;

class ExcursionRequest extends FormRequest
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
            'excursion_id' => 'required|integer'
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'excursion_id.required' => 'Данное поле является обязательным для заполнения',
            'excursion_id.integer' => 'Данное поле должно быть строкой',
        ];
    }
}
