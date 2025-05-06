<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Commande;
use Illuminate\Support\Facades\DB;

class StripeController extends Controller
{
    public function checkout(Request $request)
{
    Stripe::setApiKey(config('services.stripe.secret'));

    $commande = Commande::create([
        'date_commande' => now(),
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'shipping_address' => $request->shipping_address,
        'shipping_city' => $request->shipping_city,
        'shipping_country' => $request->shipping_country,
        'shipping_cost' => $request->shipping_cost,
        'tax' => $request->tax,
        'total_price' => $request->total_price,
        'notes' => $request->notes,
        'utilisateur_id' => auth()->id(),
    ]);

    $cartItems = json_decode($request->input('cart_items'), true);

    foreach ($cartItems as $item) {
        DB::table('commande_produit')->insert([
            'commande_id' => $commande->id,
            'produit_id' => $item['id'], // or whatever the product id field is called
            'quantite' => $item['quantity'],
            'prix_unitaire' => $item['price'], // or whatever the price field is called
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    $session = Session::create([
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Commande #' . $commande->id,
                ],
                'unit_amount' => intval($commande->total_price * 100),
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('stripe.cancel'),
        'metadata' => [
            'commande_id' => $commande->id,
        ],
        'payment_method_types' => ['card'],
    ]);

    return redirect($session->url);
}

    public function success(Request $request)
    {
        return view('checkout.success');
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}
