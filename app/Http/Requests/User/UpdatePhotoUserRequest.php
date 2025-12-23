<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhotoUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo' => 'required|image|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'photo.required' => 'A foto é obrigatória.',
            'photo.image' => 'O arquivo deve ser uma imagem.',
            'photo.max' => 'A imagem não deve ser maior que 2MB.',
        ];
    }
}
