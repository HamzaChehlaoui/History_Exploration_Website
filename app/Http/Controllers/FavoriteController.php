<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        $query = Favorite::with(['article.utilisateur', 'article.images'])
            ->where('utilisateur_id', $user->id);

        switch ($request->get('sort', 'newest')) {
            case 'oldest':
                $query->orderBy('date_creation', 'asc');
                break;
            case 'title_asc':
                $query->join('articles', 'favorites.article_id', '=', 'articles.id')
                      ->orderBy('articles.title', 'asc')
                      ->select('favorites.*');
                break;
            case 'title_desc':
                $query->join('articles', 'favorites.article_id', '=', 'articles.id')
                      ->orderBy('articles.title', 'desc')
                      ->select('favorites.*');
                break;
            case 'newest':
            default:
                $query->orderBy('date_creation', 'desc');
                break;
        }

        $favorites = $query->paginate(10);

        $favoriteIds = $user->favorites->pluck('article_id')->toArray();

        $recommendedArticles = Article::with(['utilisateur', 'images'])
            ->whereNotIn('id', $favoriteIds)
            ->orderBy('time_period', 'desc')
            ->take(3)
            ->get();

        if ($recommendedArticles->count() < 3) {
            $moreArticles = Article::with(['utilisateur', 'images'])
                ->whereNotIn('id', $favoriteIds)
                ->whereNotIn('id', $recommendedArticles->pluck('id')->toArray())
                ->orderBy('time_period', 'desc')
                ->take(3 - $recommendedArticles->count())
                ->get();

            $recommendedArticles = $recommendedArticles->concat($moreArticles);
        }

        return view('User.favorites', compact('favorites', 'recommendedArticles'));
    }

    public function toggle(Article $article)
    {
        $user = Auth::user();

        $existing = Favorite::where('utilisateur_id', $user->id)
                            ->where('article_id', $article->id)
                            ->first();

        if ($existing) {
            $existing->delete();
            return back()->with('success', 'Article retiré des favoris.');
        }

        Favorite::create([
            'utilisateur_id' => $user->id,
            'article_id' => $article->id,
            'date_creation' => now(),
        ]);

        return back()->with('success', 'Article ajouté aux favoris.');
    }
}
