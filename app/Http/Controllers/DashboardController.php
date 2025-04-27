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
    public function destroy($id)
    {
        $user = Utilisateur::findOrFail($id);
        $user->delete();
        return redirect('/Dashbord_admin')->with('success', 'User deleted successfully');
    }
    public function approve(Article $article)
    {
        $article->status = 'approved';
        $article->save();

        return redirect()->back()->with('success', 'Article approved.');
    }

    public function reject(Article $article)
    {
        $article->status = 'rejected';
        $article->save();

        return redirect()->back()->with('success', 'Article rejected.');
    }
    public function destroy_Article($id)
        {
            $article = Article::findOrFail($id);
            $article->delete();
            return redirect('/Dashbord_admin')->with('success', 'Article supprimé');
        }
}
