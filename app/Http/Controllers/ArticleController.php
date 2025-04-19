<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    public function show($id)
{
    $article = Article::with(['images', 'utilisateur', 'category'])->findOrFail($id);

    // Add related articles query
    $relatedArticles = Article::where('category_id', $article->category_id)
                            ->where('id', '!=', $article->id)
                            ->limit(3)
                            ->get();

    return view('Visiteur.articles', compact('article', 'relatedArticles'));
}

public function index($id)
{
    $article = Article::with('images')->where('id', $id)->first();
    return view('Visiteur.articles', compact('article'));
}



    public function create()
    {
        $categories = Category::all();
        $utilisateurs = Utilisateur::all();
        return view('articles.create', compact('categories', 'utilisateurs'));
    }

    public function store(StoreArticleRequest $request)
    {
        $article = Article::create($request->validated());
        return redirect()->route('articles.index')->with('success', 'Article créé avec succès');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $utilisateurs = Utilisateur::all();
        return view('articles.edit', compact('article', 'categories', 'utilisateurs'));
    }

    public function update(UpdateArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->validated());
        return redirect()->route('articles.index')->with('success', 'Article mis à jour');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé');
    }
}
