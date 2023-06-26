<?php

namespace App\Http\Requests\Admin\User;

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
            'login' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'secondName' => ['required', 'string', 'max:255'],
            'birthDate' => ['date'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле должно быть заполнено',
            'name.string' => 'Имя должно быть строкой',
            'login.required' => 'Это поле должно быть заполнено',
            'login.string' => 'Имя должно быть строкой',
            'secondName.required' => 'Это поле должно быть заполнено',
            'secondName.string' => 'Имя должно быть строкой',
            'login.unique' => 'Email уже занят',
        ];
    }
}
