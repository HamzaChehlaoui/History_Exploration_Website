<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{

    public function show($id)
    {
        $commande = Commande::findOrFail($id);
        return view('User.commande-show', compact('commande'));
    }


}
