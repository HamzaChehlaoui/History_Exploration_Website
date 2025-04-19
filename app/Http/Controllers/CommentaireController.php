<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Http\Requests\CommentaireRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CommentaireController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CommentaireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentaireRequest $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour publier un commentaire.');
        }

        Commentaire::create([
            'content' => $request->content,
            'date_commentaire' => Carbon::now(),
            'utilisateur_id' => Auth::id(),
            'article_id' => $request->article_id,
        ]);

        return redirect()->back()->with('success', 'Commentaire publié avec succès!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CommentaireRequest  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Find the comment
        $commentaire = Commentaire::findOrFail($id);

        if (auth()->id() != $commentaire->utilisateur_id) {
            return redirect()->back()->with('error', 'You are not authorized to edit this comment.');
        }

        $commentaire->content = $request->content;
        $commentaire->save();

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $commentaire = Commentaire::findOrFail($id);

    // dd($commentaire);

    if (Auth::id() != $commentaire->utilisateur_id) {
        return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer ce commentaire.');
    }

    $commentaire->delete();

    return redirect()->back()->with('success', 'Commentaire supprimé avec succès!');
}
}
