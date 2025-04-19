<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentaireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Since we're already using middleware('auth') in routes
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|string|min:3|max:1000',
            'article_id' => 'required|exists:articles,id',
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
            'content.required' => 'Le commentaire ne peut pas être vide.',
            'content.min' => 'Le commentaire doit contenir au moins 3 caractères.',
            'content.max' => 'Le commentaire ne peut pas dépasser 1000 caractères.',
            'article_id.required' => 'L\'identifiant de l\'article est requis.',
            'article_id.exists' => 'Cet article n\'existe pas.',
        ];
    }
}
