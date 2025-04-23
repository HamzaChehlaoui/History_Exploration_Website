<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Article;
use App\Models\Favorite;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FavoriteRequest;

class ProfileController extends Controller
{
    /**
     * Display the user profile page.
     *
     * @param  int  $id (optional)
     * @return \Illuminate\View\View
     */
    public function show($id = null)
    {
        $userId = $id ?? Auth::id();

        if (!$userId) {
            return redirect('login');
        }

        $user = Utilisateur::with('profileImage')->findOrFail($userId);

        $favoriteArticles = $user->favorites()
            ->with(['article.images', 'article.utilisateur'])
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get()
            ->pluck('article');

        $stats = [
            'articlesCount' => Article::where('utilisateur_id', $user->id)->count(),
            'favoritesCount' => $user->favorites()->count(),
        ];

        $isOwnProfile = Auth::id() === $user->id;

        return view('User.PageProfile', compact('user', 'favoriteArticles', 'stats', 'isOwnProfile'));
    }

    /**
     * Display the form for editing the user profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();
        return view('User.User_settings_page', compact('user'));
    }

    /**
     * Update the user profile.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        $validatedData = $request->validated();

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if (isset($validatedData['password']) && !empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile-images', 'public');

            if ($user->profileImage && Storage::disk('public')->exists($user->profileImage->path)) {
                Storage::disk('public')->delete($user->profileImage->path);
            }

            if ($user->profileImage) {
                $user->profileImage->path = $imagePath;
                $user->profileImage->save();
            } else {
                $user->profileImage()->create([
                    'path' => $imagePath
                ]);
            }
        }

        return redirect('/profile')->with('success', 'Profile updated successfully');
    }

    /**
     * Get the user's favorite articles.
     *
     * @return \Illuminate\View\View
     */
    public function favorites()
    {
        $user = Auth::utilisateur();
        $favoriteArticles = $user->favorites()
            ->with('article.images')
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->pluck('article');

        return view('User.PageProfile', compact('favoriteArticles'));
    }

    /**
     * Add or remove an article from user's favorites.
     *
     * @param  \App\Http\Requests\FavoriteRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleFavorite(FavoriteRequest $request)
    {
        $user = Auth::user();
        $articleId = $request->validated()['article_id'];

        $existingFavorite = Favorite::where('utilisateur_id', $user->id)
            ->where('article_id', $articleId)
            ->first();

        if ($existingFavorite) {

            $existingFavorite->delete();
            $isFavorite = false;
        } else {

            Favorite::create([
                'utilisateur_id' => $user->id,
                'article_id' => $articleId,
                'date_creation' => now()
            ]);
            $isFavorite = true;
        }

        $article = Article::findOrFail($articleId);
        $favoriteCount = Favorite::where('article_id', $articleId)->count();

        return response()->json([
            'success' => true,
            'isFavorite' => $isFavorite,
            'favoriteCount' => $favoriteCount
        ]);
    }
}
