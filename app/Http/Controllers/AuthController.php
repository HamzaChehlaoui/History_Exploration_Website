<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
{
    // Create a new user after validation
    $user = Utilisateur::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Hash the password for security
        'role_id' => $request->role_id,
    ]);

    // Redirect to the login page with a success message
    return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
}
}
