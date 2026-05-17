<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'role' => 'required|in:administrador,veterinario',
            'nombre_completo' => 'nullable|required_if:role,veterinario|string|max:255',
            'especialidad' => 'nullable|required_if:role,veterinario|string|max:255',
            'cedula_profesional' => 'nullable|required_if:role,veterinario|string|max:255',
            'foto_firma' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser texto válido.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no tiene un formato válido.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            'email.unique' => 'Este correo electrónico ya se encuentra registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 4 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'role.required' => 'Debes seleccionar un rol para el usuario.',
            'role.in' => 'El rol seleccionado no es válido.',
            'nombre_completo.required_if' => 'El nombre del doctor es obligatorio al seleccionar el rol de Veterinario.',
            'nombre_completo.string' => 'El nombre completo debe ser un texto válido.',
            'nombre_completo.max' => 'El nombre completo no puede exceder los 255 caracteres.',
            'especialidad.required_if' => 'La especialidad es obligatoria al seleccionar el rol de Veterinario.',
            'especialidad.string' => 'La especialidad debe ser un texto válido.',
            'especialidad.max' => 'La especialidad no puede exceder los 255 caracteres.',
            'cedula_profesional.required_if' => 'La cédula profesional es obligatoria al seleccionar el rol de Veterinario.',
            'cedula_profesional.string' => 'La cédula profesional debe ser un texto válido.',
            'cedula_profesional.max' => 'La cédula profesional no puede exceder los 255 caracteres.',
            'foto_firma.image' => 'La firma debe ser un archivo de imagen válido.',
            'foto_firma.mimes' => 'La firma debe estar en formato: jpeg, png o jpg.',
            'foto_firma.max' => 'El tamaño de la imagen no puede ser mayor a 2MB.',
        ];
    }
}
