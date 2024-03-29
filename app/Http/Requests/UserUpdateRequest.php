<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|numeric|unique:account,id,'.$this->id,
            'profile_id' => 'required|numeric|unique:profile,id,'.$this->profile_id,
            'name' => 'max:100',
            'lastname' => 'max:100',
            'document' => 'max:15|unique:profile,id,'.$this->profile_id,
            'email' => 'email|max:50|unique:profile,id,'.$this->profile_id,
            'role' => 'in:ADMIN,USER,DEV',
            // 'username' => 'max:50',
            // 'password' => 'max:255',
            'status' => 'in:A,I',

        ];
    }

    public function messages(){
        return [
            'id.required' => 'El ID es requerido.',
            'id.numeric' => 'El ID debe ser numerico.',
            'id.unique' => 'El ID no debe repetirse.',

            'name.required' => 'El nombre es requerido.',
            'name.string' => 'El nombre debe ser un texto.',
            'name.max' => 'El nombre no debe exceder 255 caracteres.',
            'lastname.required' => 'El apellido es requerido.',
            'lastname.string' => 'El apellido debe ser un texto.',
            'lastname.max' => 'El apellido no debe exceder 255 caracteres.',
            'document.required' => 'El documento es requerido.',
            'document.numeric' => 'El documento debe ser numerico',
            'document.unique' => 'El documento ya esta ocupado.',
            'document.max' => 'El documento no debe exceder 15 caracteres.',
            'email.required' => 'El email es requerido.',
            'email.email' => 'Ingrese un email valido.',
            'email.unique' => 'El email no debe repetirse.',
            'email.max' => 'El apellido no debe exceder 50 caracteres.',
            'role.in' => 'Rol no permitido.',
            'profile_id.required' => 'El perfil es requerido.',
            'profile_id.unique' => 'El perfil ya esta ocupado.',
            'profile_id.exists' => 'El perfil no existe.',
            'status.in' => 'Ingrese un estado valido.'

        ];
    }
}
