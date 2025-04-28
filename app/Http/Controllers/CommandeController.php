<?php
namespace App\Http\Controllers;
use App\Models\Commande;
use App\Models\Produit;
use App\Http\Requests\StoreCommandeRequest;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function store(StoreCommandeRequest $request)
    {
        try {
            DB::beginTransaction();

            // Create the order
            $commande = Commande::create($request->validated());

            // Get cart items from session/local storage
            $cartItems = json_decode($request->cart_items, true) ?? [];

            // Aggregate quantities for the same product
            $aggregatedItems = [];
            foreach ($cartItems as $item) {
                if (isset($aggregatedItems[$item['id']])) {
                    $aggregatedItems[$item['id']]['quantity'] += $item['quantity'];
                } else {
                    $aggregatedItems[$item['id']] = $item;
                }
            }

            // Process each aggregated item in the cart
            foreach ($aggregatedItems as $item) {
                $produit = Produit::find($item['id']);

                if (!$produit) {
                    continue;
                }

                // Check if product is in stock
                if ($produit->quantite < $item['quantity']) {
                    DB::rollBack();
                    return redirect()->back()->with('error', "Le produit '{$produit->name}' n'est plus disponible en quantité suffisante.");
                }

                // Decrease stock
                $produit->quantite -= $item['quantity'];
                $produit->save();

                // Add to order_items table
                $commande->items()->create([
                    'produit_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }

            DB::commit();

            // Clear cart after successful order
            return redirect('/Stor')->with('success', 'Commande enregistrée avec succès !');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }
}
