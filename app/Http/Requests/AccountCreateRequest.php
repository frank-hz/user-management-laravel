<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'profile_id' => 'required|unique:account|exists:profile,id',
            'username' => 'required|max:50',
            'password' => 'required|max:255',
            'status' => 'in:A,I',

        ];
    }

    public function messages()
    {
        return [
            'profile_id.required' => 'El perfil es requerido.',
            'profile_id.unique' => 'El perfil debe ser unico.',
            'profile_id.exists' => 'El perfil no existe.',
            'username.required' => 'El usuario es requerido.',
            'username.max' => 'El usuario no debe exceder 50 caracteres.',
            'password.required' => 'La contraseña es requerida.',
            'password.max' => 'La contraseña no debe exceder 255 caracteres.',
            'status.in' => 'Ingrese un estado valido.',
        ];
    }
}
