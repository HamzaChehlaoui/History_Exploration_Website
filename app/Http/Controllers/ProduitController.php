<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Models\ProduitImage;

class ProduitController extends Controller
{
    public function index(Request $request)
{
    $produits = Produit::paginate(4);

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

        return redirect()->back()->with('success', 'Produit ajouté avec succès.');
    }

    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        return view('produits.edit', compact('produit'));
    }

    public function update(UpdateProduitRequest $request, Produit $produit)
    {
        $produit->update($request->validated());

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour.');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé.');
    }
}
