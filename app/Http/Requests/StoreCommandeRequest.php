<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommandeRequest extends FormRequest
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
    public function rules()
{
    return [
        'date_commande' => 'required|date',
        'total_price' => 'required|numeric',
        'tax' => 'nullable|numeric',
        'shipping_cost' => 'nullable|numeric',
        'status' => 'required|in:en_attente,valide,annule',
        'payment_status' => 'required|in:en_attente,payé,échoué',
        'payment_method' => 'nullable|string',
        'payment_reference' => 'nullable|string',
        'shipping_address' => 'nullable|string',
        'shipping_city' => 'nullable|string',
        'shipping_state' => 'nullable|string',
        'shipping_zip_code' => 'nullable|string',
        'shipping_country' => 'nullable|string',
        'shipping_method' => 'nullable|string',
        'tracking_number' => 'nullable|string',
        'notes' => 'nullable|string',
        'utilisateur_id' => 'required|exists:utilisateurs,id',
    ];
}

}
