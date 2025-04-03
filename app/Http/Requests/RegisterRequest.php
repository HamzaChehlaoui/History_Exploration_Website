<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow all users to use this request
    }

    /**
     * Define validation rules for user registration.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255', // Name is required, must be a string, and max length 255
            'email' => 'required|email|unique:utilisateurs,email', // Must be a valid, unique email
            'password' => 'required|min:8|confirmed', // Password must be at least 8 characters and confirmed
            'role_id' => 'required|exists:roles,id', // Role must exist in the roles table
        ];
    }

    /**
     * Customize validation error messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already in use.',
            'password.required' => 'The password field is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'role_id.required' => 'You must select a role.',
            'role_id.exists' => 'The selected role is invalid.',
        ];
    }
}
