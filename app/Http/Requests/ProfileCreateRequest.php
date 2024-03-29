<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileCreateRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email|unique:profile|max:50',
            'role' => 'in:ADMIN,USER,DEV'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'name.string' => 'El nombre debe ser un texto.',
            'name.max' => 'El nombre no debe exceder 255 caracteres.',
            'lastname.required' => 'El apellido es requerido.',
            'lastname.string' => 'El apellido debe ser un texto.',
            'lastname.max' => 'El apellido no debe exceder 255 caracteres.',
            'email.required' => 'El email es requerido.',
            'email.email' => 'Ingrese un email valido.',
            'email.unique' => 'El email repetido.',
            'email.max' => 'El apellido no debe exceder 50 caracteres.',
            'role.in' => 'Rol no permitido.'
        ];
    }
}
