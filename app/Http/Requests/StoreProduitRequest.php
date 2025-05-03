<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduitRequest extends FormRequest
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
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'prix' => 'required|numeric|min:0',
        'quantite' => 'required|integer|min:0',
        'imagePath' => 'required|url|max:2048',
        'category_id' => 'required|exists:categories,id',
    ];
}

public function messages(): array
{
    return [
        'name.required' => 'Le nom du produit est obligatoire',
        'prix.required' => 'Le prix est obligatoire',
        'prix.numeric' => 'Le prix doit être un nombre',
        'prix.min' => 'Le prix doit être positif',
        'quantite.required' => 'La quantité est obligatoire',
        'quantite.integer' => 'La quantité doit être un nombre entier',
        'quantite.min' => 'La quantité doit être positive',
        'imagePath.required' => 'L\'URL de l\'image est obligatoire',
        'imagePath.url' => 'Veuillez entrer une URL d\'image valide',
    ];
}

}
