<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\Mime\Message;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'secondName' => 'required|string|',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле должно быть заполнено',
            'name.string' => 'Имя должно быть строкой',
            'secondName.required' => 'Это поле должно быть заполнено',
            'name.unique' => 'Email уже занят',
        ];
    }
}
