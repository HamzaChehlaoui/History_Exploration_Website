<?php
namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
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
