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

        $searchUser = $request->input('search_user');

        $users = Utilisateur::when($searchUser, function ($query, $searchUser) {
            return $query->where('name', 'like', "%{$searchUser}%")
                        ->orWhere('email', 'like', "%{$searchUser}%");
        })->paginate(5);


        $searchProduct = $request->get('search_product');
        $products = Produit::when($searchProduct, function ($query, $searchProduct) {
            return $query->where('name', 'like', "%{$searchProduct}%");
        })->paginate(4);

        $searchArticle = $request->get('search_article');
        $status = $request->get('status');

        $articlesQuery = Article::query();

        if ($searchArticle) {
            $articlesQuery->where('title', 'like', "%{$searchArticle}%");
        }

        if ($status) {
            $articlesQuery->where('status', $status);
        }

        $articles = $articlesQuery->paginate(5);

        return view('Admin.Dashbord_admin', compact(
            'totalUsers',
            'totalArticles',
            'totalProducts',
            'totalCommands',
            'users',
            'products',
            'articles'
        ));
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
