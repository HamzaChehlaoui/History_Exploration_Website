<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;

class PayPalController extends Controller
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
        $token = $this->provider->getAccessToken();
        $this->provider->setAccessToken($token);
    }

    public function createPayPalOrder(Request $request)
    {
        try {
            $order = $this->provider->createOrder([
                "intent" => "CAPTURE",
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => $request->currency,
                            "value" => $request->value
                        ]
                    ]
                ]
            ]);

            return response()->json($order);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function capturePayPalOrder(Request $request)
    {
        try {
            $result = $this->provider->capturePaymentOrder($request->orderID);

            if ($result['status'] === 'COMPLETED') {

                $commande = new Commande();
                $commande->utilisateur_id = Auth::id();
                $commande->date_commande = now();
                $commande->total_price = $request->value;
                $commande->payment_method = 'PayPal';
                $commande->payment_status = 'payé';
                $commande->payment_reference = $request->orderID;

                $commande->shipping_address = $request->shipping_address ?? null;
                $commande->shipping_city = $request->shipping_city ?? null;
                $commande->shipping_state = $request->shipping_state ?? null;
                $commande->shipping_zip_code = $request->shipping_zip_code ?? null;
                $commande->shipping_country = $request->shipping_country ?? null;
                

                $commande->save();

                return response()->json(['status' => 'COMPLETED']);
            }

            return response()->json(['status' => 'FAILED'], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
