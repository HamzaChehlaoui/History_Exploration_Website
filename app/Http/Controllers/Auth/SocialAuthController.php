<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{
    // Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->loginOrCreateUser($user, 'google');
        return redirect()->route('home');
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
        return redirect()->route('home');
    }

    protected function loginOrCreateUser($providerUser, $provider)
    {
        $user = Utilisateur::where('provider_id', $providerUser->getId())->first();

        if (!$user) {
            $user = Utilisateur::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
                'email_verified_at' => now(),
                'password' => bcrypt(uniqid()),
            ]);
        }

        Auth::login($user, true);
    }
}
