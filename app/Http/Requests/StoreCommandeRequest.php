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
    public function rules(): array
    {
        return [
            'date_commande' => 'required|date',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'shipping_address' => 'required|string|max:255',
            'shipping_city' => 'required|string|max:255',
            'shipping_state' => 'required|string|max:255',
            'shipping_zip_code' => 'required|string|max:20',
            'shipping_country' => 'required|string|max:255',
            'shipping_method' => 'required|string|max:50',
            'shipping_cost' => 'required|numeric',
            'tax' => 'required|numeric',
            'total_price' => 'required|numeric',
            'notes' => 'nullable|string',
            'payment_method' => 'required|string|max:50',
            'payment_reference' => 'nullable|string|max:255',
            'payment_status' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'tracking_number' => 'nullable|string|max:255',
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'cart_items' => 'required|string',
        ];
    }
}
