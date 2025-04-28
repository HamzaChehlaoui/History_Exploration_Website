<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Produit;

class SearchController extends Controller
{
    public function index(Request $request)
{
    $query = $request->input('query');
    $type = $request->input('type'); // Search type

    if ($type == 'articles') {
        $results = Article::where('title', 'like', "%$query%")
                          ->orWhere('content', 'like', "%$query%")
                          ->get();
    } elseif ($type == 'products') {
        $results = Produit::where('name', 'like', "%$query%")
                          ->orWhere('description', 'like', "%$query%")
                          ->get();
    } else {
        $results = collect();
    }

    // Return the data as JSON
    return response()->json([
        'results' => $results
    ]);
}

}
