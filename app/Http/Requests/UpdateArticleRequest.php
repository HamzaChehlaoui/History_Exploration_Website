<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'date_publication' => 'sometimes|required|date',
            'category_id' => 'sometimes|required|exists:categories,id',
            'utilisateur_id' => 'sometimes|required|exists:utilisateurs,id',
        ];
    }
}
