<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\Article;
use App\Models\Produit;
use App\Models\Commande;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = Utilisateur::count();
        $totalArticles = Article::count();
        $totalProducts = Produit::count();
        $totalCommands = Commande::count();
        $users = Utilisateur::paginate(5);;


        return view('Admin.Dashbord_admin', compact('totalUsers', 'totalArticles', 'totalProducts', 'totalCommands','users'));
    }
}
