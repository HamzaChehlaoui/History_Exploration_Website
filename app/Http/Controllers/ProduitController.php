<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;

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
        return view('produits.create');
    }

    public function store(StoreProduitRequest $request)
    {
        Produit::create($request->validated());

        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
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
