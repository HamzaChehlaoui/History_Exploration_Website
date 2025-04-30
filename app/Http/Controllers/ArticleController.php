<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\DB;
use App\Models\ArticleImage;
use App\Models\Media;
use App\Notifications\ArticleCreated;


class ArticleController extends Controller
{
        public function show($id)
        {
            $article = Article::with(['images', 'utilisateur', 'category', 'favorites'])->findOrFail($id);

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
            return view('User.Add_Article');
        }

        public function store(StoreArticleRequest $request)
        {
            // dd($request->all());
            DB::beginTransaction();

            try {

                $article = Article::create([
                    'title' => $request->title,
                    'time_period' => $request->time_period,
                    'location' => $request->location,
                    'description' => $request->description,
                    'content' => $request->content,
                    'references' => $request->references,
                    'category_id' => 1,
                    'utilisateur_id' => auth()->id(),
                ]);

                if ($request->image_links) {
                    foreach ($request->image_links as $link) {
                        if ($link) {
                            ArticleImage::create([
                                'article_id' => $article->id,
                                'path' => $link,
                            ]);
                        }
                    }
                }


                if ($request->media_links && $request->media_types) {
                    foreach ($request->media_links as $index => $link) {
                        if ($link) {
                            Media::create([
                                'article_id' => $article->id,
                                'type' => $request->media_types[$index],
                                'lien' => $link,
                            ]);
                        }
                    }
                }
               /** @var \App\Models\Utilisateur $user */
                $user = auth()->user();
                $user->notify(new ArticleCreated($article));

                DB::commit();
                if($user->role_id===1){
                    return redirect('/Dashbord_admin');
                }
                return redirect('/')->with('success', 'Article créé avec succès');
            } catch (\Exception $e) {
                dd($e->getMessage());
                DB::rollBack();
                if($user->role_id===1){
                    return redirect('/Dashbord_admin');
                }
                return redirect('/')->with('error', 'Erreur lors de la sauvegarde.');
            }
        }

        public function edit($id)
        {
            $article = Article::findOrFail($id);
            $categories = Category::all();
            $utilisateurs = Utilisateur::all();
            return view('User.Edit_Article', compact('article', 'categories', 'utilisateurs'));
        }

        public function update(UpdateArticleRequest $request, $id)
        {
            $article = Article::findOrFail($id);
            $article->update($request->validated());
            return redirect('/')->with('success', 'Article mis à jour');
        }

        public function destroy($id)
        {
            $article = Article::findOrFail($id);
            $article->delete();
            if(auth()->user()->role_id===1){
                return redirect('/Dashbord_admin')->with('success', 'Article supprimé');
            }
            return redirect('/')->with('success', 'Article supprimé');
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
}
