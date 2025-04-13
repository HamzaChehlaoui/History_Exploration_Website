<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\Auth\SocialAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Other routes for your site

Route::group([] ,function (){

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::view('/', 'Visiteur.index');
    Route::view('/Explorer', 'Visiteur.Explorer_Page');
    Route::get('/Stor', [ProduitController::class, 'index'])->name('store');
    Route::view('/about', 'Visiteur.Page_About');
    Route::view('/login', 'Auth.login');
    Route::view('/PageConditions','Visiteur.PageConditions');


});

Route::middleware(['web'])->group(function () {

    Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
    Route::get('auth/facebook', [SocialAuthController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('auth/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback']);

});
