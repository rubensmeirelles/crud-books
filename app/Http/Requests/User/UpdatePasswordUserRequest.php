<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password' => ['required', 'string', 'min:8']
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'A senha é obrigatório.',
            'password.min' => 'A senha deve ter no mínimo 8 e no máximo 12 caracteres.',
        ];
    }
}
