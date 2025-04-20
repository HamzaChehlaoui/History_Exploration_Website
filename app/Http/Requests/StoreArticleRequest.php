<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'title' => 'required|string|max:255',
        'time_period' => 'required|string|max:100',
        'location' => 'required|string|max:255',
        'description' => 'required|string',
        'content' => 'required|string',

        'images' => 'nullable|array',
        'images.*' => 'nullable|image|max:2048',

        'media_links' => 'nullable|array',
        'media_links.*' => 'nullable|url',

        'media_types' => 'nullable|array',
        'media_types.*' => 'nullable|string|in:video,audio,pdf',

        'references' => 'nullable|string|max:5000',
        ];
    }
}
