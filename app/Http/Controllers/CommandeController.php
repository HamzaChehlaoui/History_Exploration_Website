<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{


    public function show(Commande $commande)
{

    $commande->load('produits');

    return view('User.commande-show', compact('commande'));
}

public function afficherCommandes()
{
    $user = Auth::user();
    $commandes = Commande::where('utilisateur_id', $user->id)->orderBy('date_commande', 'desc')->get();

    return view('User.commande-show', compact('commandes'));
}


}
