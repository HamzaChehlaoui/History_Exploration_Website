<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Models\ProduitImage;
use App\Notifications\ProduitCreated;
use Illuminate\Support\Facades\Log;
class ProduitController extends Controller
{
    public function index(Request $request)
    {
        $produits = Produit::paginate(8);

        if ($request->ajax()) {
            return view('Visiteur.Partials.produits', compact('produits'))->render();
        }

        return view('Visiteur.Online_Stor', compact('produits'));
    }

    public function create()
    {
        return view('Admin.Add_prodact');
    }

    public function store(StoreProduitRequest $request)
    {
        $validated = $request->validated();

        // Créer le produit
        $produit = Produit::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'prix' => $validated['prix'],
            'quantite' => $validated['quantite'],
        ]);

        // Traiter les URLs d'images
        if ($request->has('image_urls') && is_array($request->image_urls)) {
            foreach ($request->image_urls as $imageUrl) {

                if (!empty($imageUrl)) {
                    ProduitImage::create([
                        'produit_id' => $produit->id,
                        'path' => $imageUrl
                    ]);
                }
            }
        }
        /** @var \App\Models\Utilisateur $user */
        $user =auth()->user();
        $user -> notify(new ProduitCreated($produit));
        return redirect()->back()->with('success', 'Produit ajouté avec succès.');
    }

    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('Admin.edit', compact('produit'));
    }

    public function update(UpdateProduitRequest $request, Produit $produit)
    {
        $produit->update($request->validated());

        return redirect('/Dashbord_admin')->with('success', 'Produit mis à jour.');
    }

    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return redirect('/Dashbord_admin')->with('success', 'Produit supprimé.');
    }

    public function updateStock(Request $request)
{
    $product = Produit::find($request->product_id);

    if (!$product) {
        return response()->json(['error' => 'Product not found.'], 404);
    }

    if ($product->quantite <= 0) {
        return response()->json(['error' => 'Product out of stock.'], 400);
    }

    $product->quantite -= 1;
    $product->save();

    return response()->json([
        'success' => true,
        'new_quantity' => $product->quantite
    ]);
}
public function restoreStock(Request $request)
{
    $product = Produit::find($request->product_id);

    if (!$product) {
        return response()->json(['error' => 'Product not found.'], 404);
    }

    $product->quantite += 1; // Increase the quantity
    $product->save();

    return response()->json([
        'success' => true,
        'new_quantity' => $product->quantite
    ]);
}
}
