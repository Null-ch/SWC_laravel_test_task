<?php

namespace App\Http\Requests\Admin\Events;

use Illuminate\Foundation\Http\FormRequest;

class StroreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'eventDate' => 'required',
            'creator_id' => '',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'title.string' => 'Данные не являются строкой',
            'content.string' => 'Данные не являются строкой',
            'content.required' => 'Это поле обязательно для заполнения',
        ];
    }
}
