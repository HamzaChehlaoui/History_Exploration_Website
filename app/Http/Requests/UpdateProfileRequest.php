<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Only allow users to update their own profile
        return $this->user()->id === (int) $this->route('id') || !$this->route('id');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('utilisateurs')->ignore($this->user()->id)
            ],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:20048'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['nullable', 'string', 'min:8'],
            'current_password' => ['required_with:password', 'string', 'current_password'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Your name is required.',
            'email.required' => 'Your email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already in use by another account.',
            'profile_image.image' => 'The uploaded file must be an image.',
            'profile_image.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
            'profile_image.max' => 'Image size cannot exceed 2MB.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
            'current_password.required_with' => 'Please enter your current password to set a new password.',
            'current_password.current_password' => 'Your current password is incorrect.',
        ];
    }
}
