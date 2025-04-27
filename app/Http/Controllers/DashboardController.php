<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\Article;
use App\Models\Produit;
use App\Models\Commande;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalUsers = Utilisateur::count();
        $totalArticles = Article::count();
        $totalProducts = Produit::count();
        $totalCommands = Commande::count();

        $users = Utilisateur::paginate(5);

        $search = $request->input('search');

        $products = Produit::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(4);

        return view('Admin.Dashbord_admin', compact('totalUsers', 'totalArticles', 'totalProducts', 'totalCommands', 'users', 'products'));
    }
    public function destroy($id)
    {
        $user = Utilisateur::findOrFail($id);
        $user->delete();
        return redirect('/Dashbord_admin')->with('success', 'User deleted successfully');
    }

    public function destroy_Article($id)
        {

            $article = Article::findOrFail($id);
            $article->delete();
            return redirect('/Dashbord_admin')->with('success', 'Article supprimé');
        }
}
