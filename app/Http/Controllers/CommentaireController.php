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
        // Validation is automatically handled by the request class

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
    public function update(Request $request, Commentaire $commentaire)
    {
        // Check if the authenticated user owns the comment
        if (Auth::id() != $commentaire->utilisateur_id) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à modifier ce commentaire.');
        }

        // Validate only the content field for updates
        $validated = $request->validate([
            'content' => 'required|string|min:3|max:1000',
        ], [
            'content.required' => 'Le commentaire ne peut pas être vide.',
            'content.min' => 'Le commentaire doit contenir au moins 3 caractères.',
            'content.max' => 'Le commentaire ne peut pas dépasser 1000 caractères.',
        ]);

        $commentaire->update([
            'content' => $validated['content'],
        ]);

        return redirect()->back()->with('success', 'Commentaire mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        // Check if the authenticated user owns the comment
        if (Auth::id() != $commentaire->utilisateur_id) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer ce commentaire.');
        }

        $commentaire->delete();

        return redirect()->back()->with('success', 'Commentaire supprimé avec succès!');
    }
}
