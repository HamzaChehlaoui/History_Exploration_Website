<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('Auth.register');  // Corrected view name here
    }

    public function register(RegisterRequest $request)
    {

        // Create a new user after validation
        $user = Utilisateur::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password for security
            'role_id' => 2,
        ]);

        // Redirect to the homepage with a success message
        return redirect('/')->with('success', 'Welcome! Registration successful.');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->route('Visiteur.index');
        }

        return back()->withErrors([
            'email' => 'Email or password incorrect.',
        ])->withInput();
    }

}
