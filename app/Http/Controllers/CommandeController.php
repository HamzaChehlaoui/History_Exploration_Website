<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Http\Requests\StoreCommandeRequest;

class CommandeController extends Controller
{
    public function store(StoreCommandeRequest $request)
    {
        Commande::create($request->validated());

        return redirect('/Stor')->with('success', 'Commande enregistrée avec succès !');
    }
}

