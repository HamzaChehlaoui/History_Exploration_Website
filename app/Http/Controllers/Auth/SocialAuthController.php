<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    // Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $this->loginOrCreateUser($user, 'google');
        return redirect('/');
    }

    // Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->loginOrCreateUser($user, 'facebook');
        return redirect('/Explorer');
    }

    public function loginOrCreateUser($googleUser, $provider)
{

    $user = Utilisateur::where('email', $googleUser->getEmail())->first();

    if (!$user) {
        $user = Utilisateur::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'password' => bcrypt(Str::random(16)),
            'role_id' => 2,
        ]);
    }

    Auth::login($user);
}
}
