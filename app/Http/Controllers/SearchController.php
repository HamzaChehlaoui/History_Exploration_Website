<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Produit;

class SearchController extends Controller
{
    public function search(Request $request)
{
    
    $query = $request->input('q');
    $articles = Article::where('title', 'LIKE', '%' . $query . '%')
                       ->orWhere('description', 'LIKE', '%' . $query . '%')
                       ->paginate(9);

                       return view('Visiteur.search_results', compact('articles'));
}

}
